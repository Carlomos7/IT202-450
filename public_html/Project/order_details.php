<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
$user_id= (int)get_user_id();
$order_id=se($_GET,"id",-1,false);
$query = "SELECT O.id, O.user_id, U.username, O.first_name, O.last_name, O.created, O.payment_method, O.money_recieved, O.user_address, OP.product_id, OP.desired_quantity, P.name,
OP.unit_price, (OP.desired_quantity * OP.unit_price) as subtotal, O.total_price FROM OrderProducts as OP INNER JOIN Orders as O on O.id = OP.order_id 
INNER JOIN Products as P on P.id = OP.product_id INNER JOIN Users as U on U.id = O.user_id 
WHERE O.id = :oid";
$db = getDB();
$stmt = $db->prepare($query);
$orders = [];
try {
    $stmt->execute([":oid" => $order_id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $orders = $results;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching orders", "danger");
}
?>
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="card">
            <div></div>
            <br>
            <h1>Order Details</h1>
            <?php foreach($orders as $o) : ?>
                <h3>Name:</h3> 
                <?php if(has_role("Admin")): ?>
                    <h4> @<a class="link-success" href="profile.php?id=<?php se($o,"user_id");?>"><?php se($o,"username") ?></a> <?php se($o,"first_name"); ?> <?php se($o,"last_name"); ?></h4>
                    <?php else: ?>
                    <h4><?php se($o,"first_name"); ?> <?php se($o,"last_name"); ?></h4>
                <?php endif; ?>
                <?php break; ?>
            <?php endforeach; ?>
            
            <div class="card-body">
                <h5 class="card-title">Order Information:</h5>
                <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                <table class="table table-borderless">
                <thead>
                    <tr>
                        <th class="text-muted">Order Placed</th>
                        <th class="text-muted">Order No</th>
                        <th class="text-muted">Payment</th>
                        <th class="text-muted">Shipping Address</th>
                    </tr>  
                </thead>
                <tbody>
                <?php foreach($orders as $o) : ?>
                    <tr>
                        <td><?php se($o,"created") ?></td>
                        <td><?php se($o,"id") ?></td>
                        <td><?php se($o,"payment_method") ?></td>
                        <td><?php se($o,"user_address") ?></td>
                    </tr>
                    <?php break; ?>;
                <?php endforeach; ?>
                </tbody>
                </table>
                <div class="product border-bottom table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <th class="text-muted">Product Name</th>
                            <th class="text-muted">Price</th>
                            <th class="text-muted">Subtotal</th>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach($orders as $o) : ?>
                                <td width="40%"><b><a class="link-success" href="product_details.php?id=<?php se($o,"product_id");?>"><?php se($o,"name") ?></a></b>
                                <div class="product-qty"> <span class="d-block">Quantity: <?php se($o,"desired_quantity") ?></span></div></td>
                                <td width="30%"><?php se($o,"unit_price") ?></td>
                                <td>$<?php se($o,"subtotal") ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row d-flex justify-content-end">
                    <div class="col-md-5">
                        <table class="table table-borderless">
                            <tr class="totals">
                                <th class="text-muted" width="25%">Total</th>
                                <?php foreach($orders as $o): ?>
                                <td>$<?php se($o,"total_price") ?></td>
                                <?php break; ?>
                                <?php endforeach; ?>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>