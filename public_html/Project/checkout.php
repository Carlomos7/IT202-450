<?php
require(__DIR__ . "/../../partials/nav.php");

is_logged_in(true);
error_log("checkout received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$user_id = get_user_id();
$user_payment = 0;
$address= "";
$pay_method="";
$firstname="";
$lastname="";
$response = ["status" => 400, "message" => "There was a problem completing your purchase"];
$flashmsg = "There was a problem completing your purchase";
http_response_code(400);
if (isset($_POST["purchase"])) { //users submits form data by clicking purchase
    //setting form variable values to be inserted into Orders table
    $address = se($_POST,"address","",false).' '.se($_POST,"apartment","",false).' '.se($_POST,"city","",false).' '. se($_POST,"state","",false).' '. se($_POST,"country","",false).' '.se($_POST,"zipcode","",false);
    $pay_method = se($_POST,"payMethod","",false);
    $firstname= se($_POST,"firstName","",false);
    $lastname= se($_POST,"lastName","",false);
    $user_payment+= (int)se($_POST,"amount","",false);
    //phpvalidation
    $hasError = false;
    if(!$address){
      flash("Please fill out address","warning");
      $hasError = true;
    }
    if($pay_method == "Choose a Payment Method"){
      flash("Please choose a payment method","warning");
      $hasError = true;
    }
    if(!$firstname || !$lastname){
      flash("Please enter first and last name","warning");
      $hasError = true;
    }
    if($user_payment <= 0){
      flash("Please enter correct payment amount","warning");
      $hasError = true;
    }
    if(!$hasError){
    //getting cart
    $db = getDB();                                                                  //vvv cost is pulled from Products table not cart this is also true in the product summary and cart page
    $stmt = $db->prepare("SELECT name, c.id as line_id, product_id, desired_quantity, cost, (cost*desired_quantity) as subtotal FROM Cart_Alt c JOIN Products p on c.product_id = p.id WHERE c.user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $balance = $user_payment;
        $total_cost = 0;
        foreach ($results as $row) {
            $total_cost += (int)se($row, "subtotal", 0, false);//calculating cart total from subtotals
        }
        if ($balance >= $total_cost) {//if the user can afford the total cost
            //can purchase
            $db->beginTransaction(); //transaction can begin and entry will be inserted into Orders table
            $stmt = $db->prepare("INSERT INTO Orders (user_id, total_price, user_address, payment_method, money_recieved, first_name, last_name) VALUES(:user_id, :total_price, :user_address, :payment_method, :money_recieved, :first_name, :last_name)");
            $next_order_id = 0;
            //get next order id
            try {
                $stmt->execute([":user_id"=>$user_id,":total_price"=>$total_cost,":user_address"=>$address,":payment_method"=>$pay_method,":money_recieved"=>$user_payment,":first_name"=>$firstname,":last_name"=>$lastname]);
                $r = $stmt->fetch(PDO::FETCH_ASSOC);
                $next_order_id = (int)se($r, "id", 0, false);
                $next_order_id= $db->lastInsertId(); //last insertId from Orders table
            } catch (PDOException $e) {
                error_log("Error fetching order_id: " . var_export($e));
                $db->rollback();
            }
            //deduct product stock (used to determine if out of stock as it'll fail with a constraint violation)
            if ($next_order_id > 0) {//updating Product table stock for each product to detuct the desired quantity
                $stmt = $db->prepare("UPDATE Products 
                set stock = stock - (select IFNULL(desired_quantity, 0) FROM Cart_Alt WHERE product_id = Products.id and user_id = :uid) 
                WHERE id in (SELECT product_id from Cart_Alt where user_id = :uid)");
                try {
                    $stmt->execute([":uid" => $user_id]);
                  } catch (PDOException $e) {
                    error_log("Update stock error: " . var_export($e, true));
                    $response["message"] = "At least one of your items is low on stock and is unable to be purchased";
                    $db->rollback();
                    $next_order_id = 0; //using as a controller
                    //Verifying the current product's unit_price against the Products table's unit_price
                    //if there is a mismatch a flash message is shown with the product and stock in quesiton
                    $stmt = $db->prepare("SELECT cart.desired_quantity, cart.product_id, product.stock, product.name, product.cost
                    FROM Products as product JOIN Cart_Alt as cart on product.id = cart.product_id WHERE cart.user_id = :uid");                  
                    try{
                      $stmt->execute([":uid" => $user_id]);
                      $check=$stmt->fetchAll(PDO::FETCH_ASSOC);
                      foreach($check as $record){
                        if((int)se($record,"stock",0,false)<(int)se($record,"desired_quantity",0,false)){
                          flash(se($record,"name",0,false)." has only ".se($record,"stock",0,false)." in stock","danger");
                        }                      
                      }
                      flash("Please update the desired quantities in your cart","warning");  

                    }catch(PDOException $e){
                      error_log(var_export($e,true));
                    }

                }
            }
            //map cart to order history
            if ($next_order_id > 0) { //Copying Cart table details into OrderProducts with OrderID from the previous steps
                $stmt = $db->prepare("INSERT INTO OrderProducts (product_id, desired_quantity, unit_price, order_id) 
                SELECT product_id, Cart_Alt.desired_quantity, unit_price, :order_id FROM Cart_Alt JOIN Products on Cart_Alt.product_id = Products.id
                 WHERE user_id = :uid");
                try {
                    $stmt->execute([":uid" => $user_id, ":order_id" => $next_order_id]);
                } catch (PDOException $e) {
                    error_log("Error mapping cart data to order history: " . var_export($e, true));
                    $db->rollback();
                    $next_order_id = 0; //using as a controller
                }
            }
            //clear the user's cart now that the process is done
            if ($next_order_id > 0) { //Clearing user's cart after successful order
                $stmt =  $db->prepare("DELETE from Cart_Alt where user_id = :uid");
                try {
                    $stmt->execute([":uid" => $user_id]);
                } catch (PDOException $e) {
                    error_log("Error deleting cart: " . var_export($e, true));
                    $db->rollback();
                    $next_order_id = 0; // using as a controller
                }
            }
            if ($next_order_id) {
                $db->commit(); //confirm pending changes
                $response["status"] = 200;
                http_response_code(200);
                $response["message"] = "Purchase complete";
                flash("Purchase complete!","success");
                die(header("Location: $BASE_PATH/order_confirmation.php?id=$next_order_id"));
                

            } else {
                $response["status"] = 200;
                http_response_code(200);
            }
        } else {
            $response["status"] = 402;
            http_response_code(200);
            $response["message"] = "You can't afford to purchase your cart";
            flash("You can't afford to purchase your cart items","warning");
        }
    } catch (PDOException $e) {
        error_log("Error fetching cart" . var_export($e, true));
    }
}
} else {
    $response["status"] = 403;
    $response["message"] = "You must be logged in to fetch your cart";
    http_response_code(403);
}
//echo json_encode($response);
json_encode($response);



//Fetching cart items for purchase summary. Product cost is pulled from products table
$query = "SELECT cart.id, cart.product_id, product.stock, product.name, product.cost, (product.cost * cart.desired_quantity) as subtotal, cart.desired_quantity
FROM Products as product JOIN Cart_Alt as cart on product.id = cart.product_id
 WHERE cart.user_id = :uid";
$db = getDB();
$stmt = $db->prepare($query);
$cart = [];
try {
    $stmt->execute([":uid" => $user_id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $cart = $results;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching cart", "danger");
}
/*if (count($cart) == 0){
  flash("There are no items in your cart", "warning");
  die(header("Location: $BASE_PATH/shop.php"));
}*/



?>
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<h1>Checkout</h1>
<div class="row">
  <div class="col-md-8 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h3 class="mb-0">Order details</h3>
        <h5>We're sorry, but we do not ship to international destinations for orders at this time.</h5>
      </div>
      <div class="card-body">
        <form id="checkoutForm" onsubmit="return validate(this)" method="POST">
        <!-- 2 column grid layout with text inputs for the Payment Method and Amount -->
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <!--<input type="text" id="payMethod" class="form-control" />-->
                <select class="form-select" name="payMethod" aria-label="paymentmethod">
                  <option selected>Choose a Payment Method</option>
                  <option value="Visa">Visa</option>
	                <option value="Amex">Amex</option>
	                <option value="Mastercard">Mastercard</option>
	                <option value="Cash">Cash</option>
                </select>
                <label class="form-label" for="payMethod">Payment Method</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
              <?php $maxAmt=0;?>
              <?php foreach ($cart as $c) : ?>
                <?php $maxAmt += (int)se($c, "subtotal", 0, false); ?>
              <?php endforeach; ?>
                <input type="number" name="amount" class="form-control" min="0" max="<?php se($maxAmt, null, 0); ?>" required/>
                <label class="form-label" for="amount">Amount</label>
              </div>
            </div>
          </div>
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" name="firstName" class="form-control" required/>
                <label class="form-label" for="firstname">First name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" name="lastName" class="form-control" required/>
                <label class="form-label" for="lastName">Last name</label>
              </div>
            </div>
          </div>

          <!-- Address Text input -->
          <div class="form-outline mb-4">
            <input type="text" name="address" class="form-control" required/>
            <label class="form-label" for="address">Address</label>
          </div>

          <!-- Apartment Text input -->
          <div class="form-outline mb-4">
            <input type="text" name="apartment" class="form-control" />
            <label class="form-label" for="apartment">Apartment, suite, etc.</label>
          </div>

          <!-- City Text input -->
          <div class="form-outline mb-4">
            <input type="text" name="city" class="form-control" required/>
            <label class="form-label" for="city">City</label>
          </div>
          <!-- State input -->
          <div class="form-outline mb-4">
            <input type="text" name="state" class="form-control" required/>
            <label class="form-label" for="state">State/Province</label>
          </div>
          <!-- Country input -->
          <div class="form-outline mb-4">
            <input type="text" name="country" class="form-control" required/>
            <label class="form-label" for="country">Country</label>
          </div>
          <!-- Zipcode Number input -->
          <div class="form-outline mb-4">
            <input type="number" name="zipcode" class="form-control" min="0" required/>
            <label class="form-label" for="zipcode">Zip Code</label>
          </div>
        </form>
      </div>
    </div>
  </div>
<!--Cart/Purchase Summary -->
  <div class="col-md-4 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Summary</h5>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
        <table class="table table-striped">
        <?php $total = 0; ?>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cart as $c) : ?>
            <tr>
                <td><a class="link-success" href="product_details.php?id=<?php se($c,"product_id");?>"><?php se($c, "name"); ?></a></td>
                <td>$<?php se($c, "cost"); ?></td>
                <td><?php se($c, "desired_quantity"); ?></td>
                <?php $total += (int)se($c, "subtotal", 0, false); ?>
                <td>$<?php se($c, "subtotal"); ?></td>
            </tr>
        <?php endforeach; ?>
        <?php if (count($cart) == 0) : ?>
            <tr>
                <td colspan="100%">No products in cart</td>
            </tr>
        <?php endif; ?>
        <tr>
            <th colspan="100%">Total: $<?php se($total, null, 0); ?> </th>
        </tr>
        </tbody>
    </table>
    <!-- return to cart or purchase products -->
        <table>
            <tr>
                <th><a href="<?php echo get_url('cart.php');?>" class="btn btn-secondary">
                Return to Cart
                </a></th>
                <th>
                  <input class="btn btn-primary" type ="submit" value="Place Order" name="purchase" form="checkoutForm"/>
                </th>
        </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  function validate(form){
    let isValid=true;

    let paymethod = form.payMethod.value;
    let amount = form.value.amount;
    let first = form.value.firstName;
    let last = form.value.lastName;
    let address = form.value.address;
    let city = form.value.city;
    let state = form.value.state;
    let country = form.value.country;
    let zip = form.value.zipcode;

    if(paymethod=="Choose a Payment Method"){
      flash("Please choose a payment method","warning");
      isValid = false;
    }
    if(!amount || amount<=0){
      flash("Please enter the correct payment amount","warning");
      isValid=false;
    }
    if(!first){
      flash("Please enter first name","warning");
      isValid=false;
    }
    if(!last){
      flash("Please enter last name","warning");
      isValid=false;
    }
    if(!address){
      flash("Please enter address","warning");
      isValid=false;
    }
    if(!city){
      flash("Please enter city","warning");
      isValid=false;
    }
    if(!country){
      flash("Please enter country","warning");
      isValid=false;
    }
    if(!isValidZip(zip)){
      flash("Invalid zip code","warning");
      isValid=false;
    }
    return isValid;
  }
</script>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>