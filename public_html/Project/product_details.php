<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../partials/nav.php");
$TABLE_NAME = "Products";

//get the table definition
$result = [];
$columns = get_columns($TABLE_NAME);
//echo "<pre>" . var_export($columns, true) . "</pre>";
$ignore = ["id", "modified", "visibility"];
$db = getDB();
//get the item
$product_id = se($_GET, "id", -1, false);
$stmt = $db->prepare("SELECT * FROM $TABLE_NAME where id =:id");
if(is_null($product_id) > 0 || $product_id < 0){
	flash("No product details to display","danger");
	redirect("$BASE_PATH" . "/shop.php");
}
try {
    $stmt->execute([":id" => $product_id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r) {
        $result = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}
//uses the fetched columns to map via input_map()
function map_column($col)
{
    global $columns;
    foreach ($columns as $c) {
        if ($c["Field"] === $col) {
            return input_map($c["Type"]);
        }
    }
    return "text";
}

//Ratings
$query = "SELECT R.id, R.product_id, R.user_id, U.username, R.rating, R.comment, R.created, (SELECT AVG(rating) FROM Ratings where product_id = :id) as average FROM Ratings as R INNER JOIN Users as U on U.id = R.user_id where R.product_id = :id";
$stmt = $db->prepare($query);
$ratings = [];
$average = 0;
try{
    $stmt->execute([":id" => $product_id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $ratings = $r;
    }
	foreach($ratings as $avg){
		$average=se($avg,"average",0,false);
		break;
	}
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching ratings", "danger");
}
//Inseting reviews into Ratings table
if(isset($_POST["submitreview"])){
	$rating = se($_POST,"rating",0,false);
	$comment = se($_POST,"message","",false);

	$hasError = false;
	if($rating < 1){
		$hasError = true;
		flash("Rating must be between 1 and 5","warning");
	}
	if(strlen($comment) <= 0){
		$hasError = true;
		flash("Review must contain a message","warning");
	}
	if(!isset($_GET["id"]) || is_null($product_id) > 0 || $product_id < 0){
		$hasError = true;
		flash("There is no item to review!","danger");
	}
	//checking if user has that product in their purchase history
	$q = "SELECT O.user_id, O.id, OP.product_id, OP.order_id FROM Orders as O INNER JOIN OrderProducts as OP on O.id = OP.order_id WHERE O.user_id = :uid and OP.product_id = :id";
	$stmt = $db->prepare($q);
	try{
		$stmt->execute([":uid"=> get_user_id(),":id"=>$product_id]);
		$u = $stmt->fetch(PDO::FETCH_ASSOC);
		if(!$u){
			$hasError=true;
			flash("You have no history of purchasing this product!","warning");
		}
	}catch (PDOException $e){
		error_log(var_export($e,true));
	}
	if(!$hasError){
		$query = "INSERT INTO Ratings (product_id, user_id, rating, comment) VALUES (:product_id, :user_id, :rating, :comment)";
		$stmt = $db->prepare($query);
		try{
			$stmt->execute([":product_id" => $product_id,":user_id" => get_user_id(), ":rating" => $rating, ":comment" => $comment]);
			flash("Review uploaded!","success");
		}catch (PDOException $e){
			error_log(var_export($e, true));
			flash("Cannot upload more than one review", "danger");	
		}
	}
}
?>

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="" width="250" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="mt-4 mb-3"> <span class="text text-muted brand"><?php se($result,"category"); ?></span>
                                <h3 class="text"><?php se($result,"name"); ?></h3>
								<?php if(!empty($ratings)) : ?>
								<div><i>Average Rating: <?php se($average) ?></i></div>
								<?php endif; ?>
                                <div class="price d-flex flex-row align-items-center"> <span class="text text-muted">Price: </span><h5 class="price"> $<?php se($result,"cost"); ?></h5></div>
                            </div>
							<h4>About this item</h4>
                            <p class="about" style="color:black"><?php se($result,"description"); ?></p>
                            <h6 class="colors"><?php se($result,"stock"); ?> in stock</h6>
							<form method="POST" action="cart.php">
									<input type="hidden" name="product_id" value="<?php se($result, "id");?>"/>
									<input type="hidden" name="action" value="add"/>
									<span>Quantity: </span><input type="number" name="desired_quantity" value="1" min="1" max="<?php se($result, "stock");?>"/>
									<input type="submit" class="btn btn-primary" value="Add to Cart"/>
									<?php if (has_role("Admin")) : ?>
										<a type= "button" class="btn btn-danger" href="admin/edit_products.php?id=<?php se($result, "id"); ?>">Edit</a>
									<?php endif; ?>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row d-flex justify-content-center">
		<h2>Write a Review</h2>
		<form id="reviewForm" class="form-horizontal" onsubmit="return validate(this);" method="POST">
			<fieldset>
				<div class="form-group">
					<label class="col-md-3 control-label" for="message">Your message</label>
					<div class="col-md-9">
						<textarea class="form-control" id="message" name="message" placeholder="Please enter your feedback here..." rows="5"></textarea>
						<table class="table table-borderless" width="100%">
							<tr>
								<td><button class="btn btn-secondary" type="reset">Clear</button></td>
								<td><button class="btn btn-primary" type ="submit" name="submitreview">Submit</button></td>
							</tr>
						</table>
					</div>
				</div>
				<!-- Rating -->
				<div class="form-group">
					<table class="table table-borderless h-25">
						<tr>
							<td width="10%"><label for="rating" class="form-label"><h2 style="color: rgb(4, 144, 64);">Rating</h2></label></td>
							<td width="20%"><input type="range" class="form-range" min="0" max="5" id="rating" name="rating" value="0"></td>
							<td width="25%"><h1 id ="rangevalue" style="color:green;"></h1></td> 
						</tr>
					</table>
				</div>
		<script>
			var slider =document.getElementById("rating");
			var output =document.getElementById("rangevalue");
			output.innerHTML = slider.value;
			

			slider.oninput = function() {
			output.innerHTML = this.value + "/5";
			}
		</script>
			</fieldset>
		</form>
	</div>
</div>
<script>
	function validate(form){
		let isValid = true;
		
		let rating = form.rating.value;
		let message = form.message.value;
		if(rating < 1){
			isValid = false;
			flash("Rating must be between 1 and 5","warning");
		}
		if(!message){
			isValid = false;
			flash("Review must contain a message","warning")
		}

		return isValid;
	}
</script>
<section class="p-4 p-md-5 text-center text-lg-start shadow-1-strong rounded" style="
    background-color:rgb(4, 144, 64)">
	<div class="container">
	<h1 style="color:white;">Reviews</h1>
		<div class="row d-flex justify-content-center">
			<?php foreach($ratings as $r) : ?>
				<div class="col-md-10">
					<div class="card">
						<div class="card-body m-3">
							<div class="row">
								<div class="col-lg-4 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
									<img src=""
										class="rounded-circle img-fluid shadow-1" alt="" width="200" height="200" />
								</div>
								<div class="col-lg-8">
									<h5 class="text-muted fw-light mb-4"><?php se($r,"comment"); ?></h5>
									<h4>Rating: <span class="fw-bold text-muted mb-0"><?php se($r,"rating") ?>/5</span></h4>
									<p class="fw-bold lead mb-2"><?php $user_id=se($r,"user_id",0,false); 
                                    $username=se($r,"username","",false); 
                                    include(__DIR__ . "/../../partials/profile_link.php"); ?></p>
									<p class="fw-bold text-muted mb-0"><?php se($r,"created") ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>