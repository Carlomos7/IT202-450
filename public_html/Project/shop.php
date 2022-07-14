<?php
//require(__DIR__ . "/../../partials/nav.php");

$results = [];
$db = getDB();
$stmt = $db->prepare("SELECT id, name, description, cost, stock, image FROM RM_Products WHERE stock > 0 LIMIT 50");
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

<div class="container-fluid">
    <h1>Shop</h1>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach ($results as $product) : ?>
            <div class="col">
                <div class="card bg-light">
                    <div class="card-header">
                        RM Placeholder
                    </div>
                    <?php if (se($product, "image", "", false)) : ?>
                        <img src="<?php se($product, "image"); ?>" class="card-img-top" alt="...">
                    <?php endif; ?>

                    <div class="card-body">
                        <h5 class="card-title">Name: <?php se($product, "name"); ?></h5>
                        <p class="card-text">Description: <?php se($product, "description"); ?></p>
                    </div>
                    <div class="card-footer">
                        Cost: <?php se($product, "cost"); ?>
                        <button onclick="purchase('<?php se($product, 'id'); ?>')" class="btn btn-primary">Buy Now</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>