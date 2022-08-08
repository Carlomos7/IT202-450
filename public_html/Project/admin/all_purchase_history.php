<?php
require(__DIR__ . "/../../../partials/nav.php");

is_logged_in(true);
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect("$BASE_PATH" . "/shop.php");
}
$user_id = get_user_id();
$result = [];
$db = getDB();
//Process filter/sorting
/*
Filter by date range
Filter by category
Sort by total, date purchased, etc
*/
$col = se($_GET, "col", "created", false);
//allowed list
if (!in_array($col, ["created", "total_price"])) {
    $col = "created"; //default value, prevent sql injection
}
$ord = se($_GET, "order", "asc", false);
//allowed list
if (!in_array($ord, ["asc", "dsc"])) {
    $order = "asc"; //default value, prevent sql injection
}
//get filters
//username partial match
$user = se($_GET, "searchOrders", "", false);
//Date Range
$default_date = date("Y-m-d", strtotime('1970-01-01'));
$fromdate = 0;

$to_date = 0;//holder

if(isset($_GET["fromdate"])){
    if(se($_GET, "fromdate", 0, false) != 0){
        $fromdate = date("Y-m-d", strtotime(se($_GET, "fromdate", "", false)));
        if($fromdate===$default_date){
            $fromdate = 0;
        }
    }
}
$todate = 0;
if(isset($_GET["todate"])){
    if(se($_GET, "todate", 0, false)!=0){
        $todate = date("Y-m-d", strtotime(se($_GET, "todate", "", false)."+1 day"));
        $to_date = date("Y-m-d", strtotime(se($_GET, "todate", "", false))); //holder
        if($todate===$default_date){
            $todate=0;
            $to_date=0;
        }
    }
}
$range = $fromdate . $todate;
/*"SELECT O.id, O.user_id, O.total_price, O.payment_method, O.money_recieved, O.first_name, O.last_name, O.created, U.username FROM Orders as O 
INNER JOIN Users as U on U.id = O.user_id WHERE O.user_id =:uid"*/

//split query into data and total
$base_query = "SELECT O.id, O.user_id, O.total_price, O.payment_method, O.money_recieved, O.first_name, 
O.last_name, O.created, U.username FROM Orders as O JOIN Users as U on U.id = O.user_id";
$total_query = "SELECT count(1) as total FROM Orders O";
//dynamic query
$query = " WHERE O.user_id != :uid";
$params = [":uid"=>$user_id]; //default params
//apply filter
if (!empty($user)) {
    $query .= " AND U.username LIKE :username";
    $params[":username"] = "%$user%";
}
if ($range !== "00") {
    if (!empty($fromdate) && $to_date=== $default_date) {
        $query .= " AND DATE(O.created) = :fromdate";
        $params[":fromdate"] = "$fromdate";
    }
    if (!empty($fromdate) && !empty($todate)) {
        $query .= " AND O.created >= :fromdate AND DATE(O.created) < :todate";
        $params[":fromdate"] = "$fromdate";
        $params[":todate"] = "$todate";
    }
}
//apply column and order sort
if (!empty($col) && !empty($ord)) {
    $query .= " ORDER BY $col $ord"; //be sure you trust these values, I validate via the in_array checks above
}
//paginate function
$per_page = 10;
paginate($total_query . $query, $params, $per_page);
$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;
//get the records
$stmt = $db->prepare($base_query . $query); //dynamically generated query
//we'll want to convert this to use bindValue so ensure they're integers so lets map our array
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null; //set it to null to avoid issues
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $result = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up orders", "danger");
}

$reCat = [];
$db = getDB();
$stmt = $db->prepare("SELECT DISTINCT category FROM Products");
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $reCat = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching categories", "warning");
}
$total = 0;
foreach ($result as $mo) {
    $total += se($mo, "total_price", 0, false);
}
?>
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<h1>All Orders</h1>
<?php if (count($result) == 0) : ?>
    <h4>No purchase history to show.</h4>
<?php endif; ?>
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<div class="container mt-5 mb-5">
    <form class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group mb-3">
            <input class="form-control" type="search" name="searchOrders" placeholder="Search for Username" value="" />
            <div class="input-group-text">Filter</div>
            <div class="input-group-text" style="color:white;background-color:rgb(4, 144, 64);">From</div>
            <input class="form-control" type="date" name="fromdate" value="<?php se($fromdate) ?>" />
            <div class="input-group-text" style="color:white;background-color:rgb(4, 144, 64);">To</div>
            <input class="form-control" type="date" name="todate" value="<?php echo ($to_date===$default_date? 0 :$to_date ); ?>" />
            <script>
                document.forms[0].fromdate.value = "<?php se($fromdate) ?>";
                document.forms[0].todate.value = "<?php echo ($to_date===$default_date? 0 :$to_date ); ?>";
            </script>
            <script>
                //quick fix to ensure proper value is selected since
                //value setting only works after the options are defined and php has the value set prior
                document.forms[0].range.value = "<?php se($range); ?>";
            </script>

            <!-- sorting -->
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text">Sort</div>
                    <!-- make sure these match the in_array filter above-->
                    <select style="color:white;background-color:rgb(4, 144, 64);" width="250px" class="form-select" aria-label="Default select example" name="col" value="<?php se($col); ?>" data="took">
                        <option value="created">Order Date</option>
                        <option value="total_price">Total</option>
                    </select>
                    <script>
                        //quick fix to ensure proper value is selected since
                        //value setting only works after the options are defined and php has the value set prior
                        document.forms[0].col.value = "<?php se($col); ?>";
                    </script>
                    <select style="color:white;" class="form-select" aria-label="Default select example" name="order" value="<?php se($ord); ?>">
                        <option <?php //se($order === "asc" ? "selected" : "");
                                ?> value="asc">Up</option>
                        <option <?php //se($order === "desc" ? "selected" : "");
                                ?> value="desc">Down</option>
                    </select>
                    <script data="this">
                        //quick fix to ensure proper value is selected since
                        //value setting only works after the options are defined and php has the value set prior
                        document.forms[0].order.value = "<?php se($ord); ?>";
                        if (document.forms[0].order.value === "asc") {
                            document.forms[0].order.style = "color:cyan;background-color:rgb(4, 144, 64);";
                        } else {
                            document.forms[0].order.style = "color:red;background-color:rgb(4, 144, 64);";
                        }
                    </script>
                </div>
            </div>
            <div class="col">
                <div class="input-group">
                    <input style="background-color:rgb(4, 144, 64);" type="submit" class="btn btn-primary" value="Apply" />
                    
                </div>
            </div>
        </div>
    </form>
    <div class="row d-flex justify-content-center">
    <div class="input-group-text" style="background-color:rgb(4, 144, 64);color:white;"><b>Total Amount: </b> $<?php se($total) ?></div>
        <?php $orderid = 0; ?>
        <?php foreach ($result as $order) : ?>

            <div class="card">
                <div></div>
                <div class="card-body">
                    <div class="card-title">
                        <h5><a class="link-success" href="<?php echo get_url("order_details.php") . "?id=" . se($order, "id", 0, false); ?>">Order No: <?php se($order, "id"); ?><a></h5>
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
                                    <td><?php se($order, "created"); ?></td>
                                    <?php if (has_role("Admin")) : ?>
                                        <td><?php $user_id = se($order, "user_id", 0, false);
                                            $username = se($order, "username", "", false);
                                            include(__DIR__ . "/../../../partials/profile_link.php"); ?>
                                            <span> <?php se($order, "first_name"); ?> <?php se($order, "last_name"); ?></span>
                                        </td>
                                    <?php else : ?>
                                        <td><?php se($order, "first_name"); ?> <?php se($order, "last_name"); ?></td>
                                    <?php endif; ?>
                                    <td><?php se($order, "payment_method"); ?></td>
                                    <td>$<?php se($order, "total_price"); ?></td>
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
require(__DIR__ . "/../../../partials/pagination.php");
require(__DIR__ . "/../../../partials/flash.php");
?>
