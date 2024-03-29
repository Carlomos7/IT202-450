<?php
require(__DIR__ . "/../../partials/nav.php");
//require_once(__DIR__ . "/../../lib/functions.php");
//cs525 7-20-2022
$results = [];
$db = getDB();
//process filters/sorting
//Sort and Filters
$col = se($_GET, "col", "cost", false);
//allowed list
if (!in_array($col, ["cost", "stock", "name", "created", "average_rating"])) {
    $col = "cost"; //default value, prevent sql injection
}
$order = se($_GET, "order", "asc", false);
//allowed list
if (!in_array($order, ["asc", "desc"])) {
    $order = "asc"; //default value, prevent sql injection
}
//get name partial search
$name = se($_GET, "searchShop", "", false);
//category
$category = "";
if (isset($_GET["c"])) {
    $category = se($_GET, "c", "", false);
} else {
    $category .= "Choose Category";
}
//Split query into data and total
$base_query = "SELECT id, name, description, category, stock, cost, average_rating, image FROM Products products";
$total_query = "SELECT count(1) as total FROM Products products";
//dynamic query
$query = " WHERE stock >0"; //1=1 shortcut to conditionally build AND clauses
$params = []; //define default params, add keys as needed and pass to execute
//apply name filter
if (!has_role("Admin")) {
    $query .= " and visibility > 0";
}
if (!empty($name)) {
    $query .= " AND name like :name";
    $params[":name"] = "%$name%";
}
if (!empty($category) && $category != "Choose Category") {
    $query .= " AND category like :category";
    $params[":category"] = "$category";
}
//apply column and order sort
if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY $col $order"; //be sure you trust these values, I validate via the in_array checks above
}
//paginate function
$per_page = 10;
paginate($total_query . $query, $params, $per_page);
/* this comment block has been replaced by paginate()
//get the total
$stmt = $db->prepare($total_query . $query); //dynamically generated query
$total = 0;
//$stmt = $db->prepare("SELECT id, name, description, cost, stock, image FROM BGD_Items WHERE stock > 0 LIMIT 50");
try {
    $stmt->execute($params); //dynamically populated params to bind
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
        //$total = (int)se($r, "total", 0, false);
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}
//apply the pagination (the pagination stuff will be moved to reusable pieces later)
$page = se($_GET, "page", 1, false); //default to page 1 (human readable number)
$per_page = 10; //how many items to show per page (hint, this could also be something the user can change via a dropdown or similar)
$offset = ($page - 1) * $per_page;
end commented out coded moved to paginate()*/
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


//$stmt = $db->prepare("SELECT id, name, description, cost, stock, image FROM RM_Items WHERE stock > 0 LIMIT 50");
try {
    $stmt->execute($params); //dynamically populated params to bind
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
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
?>
<h1>Welcome to the shop</h1>
<div></div>
<div class="container-fluid">
    <form class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group mb-3">
            <input class="form-control" type="search" name="searchShop" placeholder="Search Shop" value="<?php se($name); ?>" />
            <select style="color:white;background-color:rgb(4, 144, 64);" class="form-select" aria-label="Default select example" name="c" value="<?php se($category); ?>" data="took">
                <option disabled>Choose Category</option>
                <?php foreach ($reCat as $cat) : ?>
                    <option value="<?php se($cat, "category"); ?>"><?php se($cat, "category"); ?></option>
                <?php endforeach; ?>
            </select>
            <script>
                //quick fix to ensure proper value is selected since
                //value setting only works after the options are defined and php has the value set prior
                document.forms[0].c.value = "<?php se($category); ?>";
            </script>

            <!-- sorting -->
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text">Sort</div>
                    <!-- make sure these match the in_array filter above-->
                    <select style="color:white;background-color:rgb(4, 144, 64);" class="form-select" aria-label="Default select example" name="col" value="<?php se($col); ?>" data="took">
                        <option value="cost">Cost</option>
                        <option value="stock">Stock</option>
                        <option value="name">Name</option>
                        <option value="created">Created</option>
                        <option value="average_rating">Rating</option>
                    </select>
                    <script>
                        //quick fix to ensure proper value is selected since
                        //value setting only works after the options are defined and php has the value set prior
                        document.forms[0].col.value = "<?php se($col); ?>";
                    </script>
                    <select style="color:white;" class="form-select" aria-label="Default select example" name="order" value="<?php se($order); ?>">
                        <option <?php //se($order === "asc" ? "selected" : "");
                                ?> value="asc">Up</option>
                        <option <?php //se($order === "desc" ? "selected" : "");
                                ?> value="desc">Down</option>
                    </select>
                    <script data="this">
                        //quick fix to ensure proper value is selected since
                        //value setting only works after the options are defined and php has the value set prior
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
                    <input style="background-color:rgb(4, 144, 64);font-weight: bold;" type="submit" class="btn btn-primary" value="Apply" />
                </div>
            </div>
        </div>
    </form>
    <h3 style="color:white;background-color:rgb(4, 144, 64);">Recently added</h3>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>

    <?php endif; ?>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach ($results as $product) : ?>
            <!--(array_slice($results,0,10,true) -->
            <div class="col">
                <div class="card bg-light">
                    <div class="card-header">
                        <h6><?php se($product, "category"); ?></h6>
                    </div>
                    <?php if (se($product, "image", "", false)) : ?>
                        <img src="<?php se($product, "image"); ?>" class="card-img-top" alt="...">
                    <?php endif; ?>

                    <div class="card-body">
                        <h5><a class="link" href="product_details.php?id=<?php se($product, "id"); ?>"> <?php se($product, "name"); ?></a></h5>
                        <p class="card-text">Description: <?php se($product, "description"); ?></p>
                        <?php $rating = se($product,"average_rating","",false);?>
                        <p class="card-text"><b>Rating: </b><?php se((!empty($rating)? "$rating/5": "None")); ?></p>
                    </div>
                    <div class="card-footer">
                        Price: $<?php se($product, "cost"); ?> | <?php se($product, "stock"); ?> in stock
                        <form method="POST" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php se($product, "id"); ?>" />
                            <input type="hidden" name="action" value="add" />
                            <input type="number" name="desired_quantity" value="1" min="1" max="<?php se($product, "stock"); ?>" />
                            <input type="submit" id="blue-button" class="btn" value="Add to Cart" />
                            <?php if (has_role("Admin")) : ?>
                                <a type="button" class="btn btn-danger" href="admin/edit_products.php?id=<?php se($product, "id"); ?>">Edit</a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    function purchase(product) {
        console.log("TODO purchase product", product);
        alert("Fake transaction for this bogus product processed! :)");
        //TODO create JS helper to update all show-balance elements

    }
</script>
<?php
require(__DIR__ . "/../../partials/pagination.php");
require(__DIR__ . "/../../partials/flash.php");
?>