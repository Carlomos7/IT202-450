<?php
require(__DIR__ . "/../../partials/nav.php");

is_logged_in(true);

$TABLE_NAME = "Orders";
$user_id = get_user_id();

//get the table definition
$result = [];
$columns = get_columns($TABLE_NAME);
//echo "<pre>" . var_export($columns, true) . "</pre>";
$ignore = ["modified"];
$db = getDB();
//get the item
$query="SELECT O.id, O.user_id, O.total_price, O.payment_method, O.money_recieved, O.first_name, O.last_name, O.created, U.username FROM Orders as O JOIN Users as U on U.id = O.user_id";
if(!has_role("Admin")){
    $query.=" WHERE O.user_id =:uid";
}
$query.=" ORDER BY created DESC LIMIT 10";
$stmt = $db->prepare($query);
try {
    if(!has_role("Admin")){
        $stmt->execute([":uid" => $user_id]);
    }else{
        $stmt->execute();
    }
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
?>
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<h1>Purchase History</h1>
<?php if(count($result)== 0): ?>
    <h4>No purchase history to show.</h4>
<?php endif; ?>
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <?php foreach($result as $order) : ?>
        <div class="card">
            <div></div>
            <div class="card-body">
                <div class="card-title">
                    <h5><a class="link-success" href="order_details.php?id=<?php se($order,"id");?>">Order No: <?php se($order,"id"); ?><a></h5>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th class="text-muted">Order Placed</th>
                                <th class="text-muted">Name for Order</th>
                                <th class="text-muted">Payment Method</th>
                                <th class="text-muted">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php se($order,"created"); ?></td>
                                <?php if (has_role("Admin")) : ?>
                                    <td><a class="link-success" href="profile.php?id=<?php se($order,"user_id");?>">@<?php se($order,"username") ?></a> <?php se($order,"first_name"); ?> <?php se($order,"last_name"); ?></td>
                                <?php else : ?>
                                    <td><?php se($order,"first_name"); ?> <?php se($order,"last_name"); ?></td>
                                <?php endif; ?>
                                <td><?php se($order,"payment_method"); ?></td>
                                <td>$<?php se($order,"total_price"); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>