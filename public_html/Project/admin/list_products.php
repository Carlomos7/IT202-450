<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect("$BASE_PATH" . "/home.php");
}
$results = [];
$db = getDB();
//Sort and Filters
$col = se($_GET, "col", "created", false);
//allowed list
if (!in_array($col, ["created", "cost", "stock", "category"])) {
    $col = "created"; //default value, prevent sql injection
}
$order = se($_GET, "order", "asc", false);
//allowed list
if (!in_array($order, ["asc", "desc"])) {
    $order = "asc"; //default value, prevent sql injection
}
//partial match filters
$name = se($_GET, "productName", "", false); //double use for categories
$stock = se($_GET, "productStock", 0, false);
$base_query = "SELECT id, name, description, category, stock, cost, image, visibility, created FROM Products products";
$total_query = "SELECT count(1) as total FROM Products products";
//dynamic query
$query = " WHERE id >0";
$params = []; //default params
//apply filter
if (!empty($name)) {
    $query .= " AND name like :name OR category like :name";
    $params[":name"] = "%$name%";
}
if (isset($_GET["productStock"])) {
    if ($stock > 0) {
        $query .= " AND stock = :stock";
        $params[":stock"] = $stock;
    }
    if (empty($stock) && is_numeric($stock)) {
        $query .= " AND stock = 0";
    }
}
//apply column and order sort
if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY $col $order"; //be sure you trust these values, I validate via the in_array checks above
}
//paginate function
$per_page = 10;
paginate($total_query . $query, $params, $per_page);
$query .= " LIMIT :offset, :count";
$params[":offset"] = $offset;
$params[":count"] = $per_page;
//get records
$stmt = $db->prepare($base_query . $query); //dynamically generated query
//we'll want to convert this to use bindValue so ensure they're integers so lets map our array
foreach ($params as $key => $value) {
    $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
    $stmt->bindValue($key, $value, $type);
}
$params = null; // to avoid issues

try {
    $stmt->execute($params); //dynamically populated params to bind
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching products", "danger");
}
?>
<h1>List Products</h1>
<div class="container-fluid">
    <form class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group mb-3">
            <input class="form-control" type="search" name="productName" placeholder="Product Filter" />
            <input class="btn btn-primary" type="submit" value="Search" />
            <input class="form-control" type="number" name="productStock" placeholder="Product Stock" />
            <input class="btn btn-primary" type="submit" value="Search" />
            <!-- sorting -->
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text">Sort</div>
                    <!-- make sure these match the in_array filter above-->
                    <select style="color:white;background-color:rgb(4, 144, 64);" class="form-select" aria-label="Default select example" name="col" value="<?php se($col); ?>" data="took">
                        <option value="created">Created</option>
                        <option value="cost">Cost</option>
                        <option value="stock">Stock</option>
                        <option value="category">Category</option>
                    </select>
                    <script>
                        document.forms[0].col.value = "<?php se($col); ?>";
                    </script>
                    <select style="color:white;" class="form-select" aria-label="Default select example" name="order" value="<?php se($order); ?>">
                        <option value="asc">Up</option>
                        <option value="desc">Down</option>
                    </select>
                    <script data="this">
                        document.forms[0].order.value = "<?php se($order); ?>";
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
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <table class="table">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th><?php se($column); ?></th>
                        <?php endforeach; ?>
                        <th>Actions</th>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <td><?php se($value, null, "N/A"); ?></td>
                    <?php endforeach; ?>


                    <td>
                        <a href="edit_products.php?id=<?php se($record, "id"); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/pagination.php");
require_once(__DIR__ . "/../../../partials/flash.php");
