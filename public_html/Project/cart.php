<?php
require(__DIR__ . "/../../partials/nav.php");

is_logged_in(true);

$action = strtolower(trim(se($_POST, "action","", false)));
if (!empty($action)) {
    $db = getDB();
    switch ($action) {
        case "add":
            $query = "INSERT INTO Cart_Alt (product_id, desired_quantity, unit_price, user_id)
            VALUES (:iid, :dq, (SELECT cost FROM Products where id = :iid), :uid) ON DUPLICATE KEY UPDATE
            desired_quantity = desired_quantity + :dq";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":iid", se($_POST, "product_id", 0, false), PDO::PARAM_INT);
            $stmt->bindValue(":dq", se($_POST, "desired_quantity", 0, false), PDO::PARAM_INT);
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                $stmt->execute();
                flash("Added product to cart", "success");
            } catch (PDOException $e) {
                error_log(var_export($e, true));
                flash("Error adding product to cart", "danger");
            }
            break;
        case "update":
            $query = "UPDATE Cart_Alt set desired_quantity = :dq WHERE id = :cid AND user_id = :uid";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":dq", se($_POST, "desired_quantity", 0, false), PDO::PARAM_INT);
            //cart id specifies a specific cart item
            $stmt->bindValue(":cid", se($_POST, "cart_id", 0, false), PDO::PARAM_INT);
            //user id ensures we can only edit our cart
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try {
                $stmt->execute();
                flash("Updated product quantity", "success");
            } catch (PDOException $e) {
                //TODO handle item removal when desired_quantity is <= 0
                if(se($_POST, "desired_quantity", 0, false)< 0){
                    error_log(var_export($e, true));
                    flash("Error cannot set product quantity to below zero","danger");
                }
                //TODO handle any other update related rules per your proposal
                if(se($_POST, "desired_quantity", 0, false)== 0){
                    
                    $query = "DELETE FROM Cart_Alt WHERE id = :cid AND user_id = :uid";
                    $stmt = $db->prepare($query);
                    $stmt->bindValue(":cid", se($_POST, "cart_id", 0, false), PDO::PARAM_INT);
                    $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
                    try{
                    $stmt->execute();
                    flash("Product deleted", "success");
                    }
                    catch(PDOException $e){
                        error_log(var_export($e, true));
                        flash("Error deleting product", "danger");
                    }
                }
                else{
                    error_log(var_export($e, true));
                    flash("Error updating product quantity", "danger");
                    }
            }
            break;
        case "delete":
             //TODO you do this part
            $query = "DELETE FROM Cart_Alt WHERE id = :cid AND user_id = :uid";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":cid", se($_POST, "cart_id", 0, false), PDO::PARAM_INT);
            $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
            try{
                $stmt->execute();
                flash("Product deleted", "success");
            }
            catch(PDOException $e){
                error_log(var_export($e, true));
                flash("Error deleting product", "danger");
            }
            //flash("Developer: You implement this logic", "warning");
            break;
        case "clear":
            //clear cart contents
            $query = "DELETE FROM Cart_Alt";
            $stmt = $db->prepare($query);
            try{
                $stmt->execute();
                flash("Cart cleared", "success");
            }
            catch(PDOException $e){
                error_log(var_export($e, true));
                flash("Error clearing cart", "danger");
            }
            break;
    }
}
$query = "SELECT cart.id, cart.product_id, product.stock, product.name, product.cost, (product.cost * cart.desired_quantity) as subtotal, cart.desired_quantity
FROM Products as product JOIN Cart_Alt as cart on product.id = cart.product_id
 WHERE cart.user_id = :uid";
$db = getDB();
$stmt = $db->prepare($query);
$cart = [];
try {
    $stmt->execute([":uid" => get_user_id()]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $cart = $results;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching cart", "danger");
}
?>
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<div class="container-fluid">
    <h1>Cart</h1>
    <table class="table table-striped">
        <?php $total = 0; ?>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cart as $c) : ?>
            <tr>
                <td><a class="link-success" href="product_details.php?id=<?php se($c,"product_id");?>"><?php se($c, "name"); ?></a></td>
                <td>$<?php se($c, "cost"); ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="cart_id" value="<?php se($c, "id"); ?>" />
                        <input type="hidden" name="action" value="update" />
                        <input type="number" name="desired_quantity" value="<?php se($c, "desired_quantity"); ?>" min="0" max="<?php se($c, "stock"); ?>" />
                        <input type="submit" class="btn btn-primary" value="Update Quantity" />
                    </form>
                </td>
                <?php $total += (int)se($c, "subtotal", 0, false); ?>
                <td>$<?php se($c, "subtotal"); ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="cart_id" value="<?php se($c, "id"); ?>" />
                        <input type="hidden" name="action" value="delete" />
                        <input type="submit" class="btn btn-danger" value="X" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php if (count($cart) == 0) : ?>
            <tr>
                <td colspan="100%">No products in cart</td>
            </tr>
        <?php endif; ?>
        <tr>
            <th colspan="3">Total: $<?php se($total, null, 0); ?> </th>
            <?php if (count($cart) !== 0) : ?>
            <td>
                <a href="<?php echo get_url('checkout.php');?>" class="btn btn-success">Checkout</a>
            </td>
            <td>
                <form method="POST">
                    <input type="hidden" name="cart_id" value="<?php se($c, "id"); ?>" />
                    <input type="hidden" name="action" value="clear" />
                    <input type="submit" class="btn btn-danger" value="Clear Cart X" />
                </form>
            </td>
            <?php endif; ?>
        </tr>
        </tbody>
    </table>
</div>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>