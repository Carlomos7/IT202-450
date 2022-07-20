<?php
require(__DIR__ . "/../../partials/nav.php");
//require_once(__DIR__ . "/../../lib/functions.php");

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT id, name, description, category, cost, stock, image, visibility FROM Products WHERE stock > 0 LIMIT 50");
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
?>
<script>
    function purchase(product) {
        console.log("TODO purchase product", product);
        alert("Fake transaction for this bogus product processed! :)");
        //TODO create JS helper to update all show-balance elements

    }
</script>
<h1>Welcome to the shop</h1>
<div></div>
<h3>Selection of products</h3>
<div>
    <h3>Search</h3>
    <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group mb-3">
            <input class="form-control" type="search" name="productName" placeholder="Product Filter" />
            <input class="btn btn-primary" type="submit" value="Search" />
        </div>
    </form>
</div>
<div class="container-fluid">
    <!--<h1>Shop</h1>-->
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach (array_slice($results,0,10,true) as $product) : ?>
                <div class="col">
                    <div class="card bg-light">
                        <div class="card-header">
                            <?php se($product,"category");?> Bool: <?php se($product,"visibility"); ?>
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
<?php
require(__DIR__ . "/../../partials/flash.php");
?>