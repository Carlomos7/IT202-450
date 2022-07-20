<?php
require(__DIR__ . "/../../partials/nav.php");
//require_once(__DIR__ . "/../../lib/functions.php");

$TABLE_NAME='Products';
$results = [];
//$cat = (se($_POST, "category","", false));

if(isset($_POST["searchShop"])){
    $db = getDB();
    $stmt = $db->prepare("SELECT id, name, description, category, cost, stock, image, visibility FROM $TABLE_NAME WHERE stock > 0 AND name like :name OR category like :name LIMIT 50");
    try {
        $stmt->execute([":name" => "%" . $_POST["searchShop"] . "%"]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching products", "danger");
    }
}
else{
    $db = getDB();
    $stmt = $db->prepare("SELECT id, name, description, category, cost, stock, image, visibility FROM $TABLE_NAME WHERE stock > 0 ORDER BY modified DESC LIMIT 10");
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching products", "danger");
    }
}

/*$categories = [];
$db = getDB();
    $stmt = $db->prepare("SELECT DISTINCT category FROM $TABLE_NAME");
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $categories = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching categories", "warning");
    }*/
?>
<h1>Welcome to the shop</h1>
<div></div>
<div class="container-fluid">
    <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group mb-3">
            <input class="form-control" type="search" name="searchShop" placeholder="Search Shop" />
            <input class="btn btn-primary" type="submit" value="Search" />
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
            </button>
            
            <ul class="dropdown-menu dropdown-menu" name="category" value="action" aria-labelledby="dropdownMenuButton2">
            <?php foreach($results as $category) : ?>
                <li><button class="dropdown-item active"> <?php se($category,"category");?> </button></li>
            <?php endforeach; ?>
            </ul>
        </div>
        </div>
    </form>
    <h3>Recently added</h3>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>

    <?php endif; ?>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach ($results as $product) : ?>
            <!--(array_slice($results,0,10,true) -->
                <div class="col">
                    <div class="card bg-light">
                        <div class="card-header">
                            <?php se($product,"category");?>
                        </div>
                        <?php if (se($product, "image", "", false)) : ?>
                            <img src="<?php se($product, "image"); ?>" class="card-img-top" alt="...">
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"> <?php se($product, "name"); ?></h5>
                            <p class="card-text">Description: <?php se($product, "description"); ?></p>
                        </div>
                        <div class="card-footer">
                            Price: $<?php se($product, "cost"); ?> | <?php se($product, "stock");?> in stock
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php se($product, "id");?>"/>
                                <input type="hidden" name="action" value="add"/>
                                <input type="number" name="desired_quantity" value="1" min="1" max="<?php se($product, "stock");?>"/>
                                <input type="submit" class="btn btn-primary" value="Add to Cart"/>
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
require(__DIR__ . "/../../partials/flash.php");
?>