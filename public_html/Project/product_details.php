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
$id = se($_GET, "id", -1, false);
$stmt = $db->prepare("SELECT * FROM $TABLE_NAME where id =:id");
try {
    $stmt->execute([":id" => $id]);
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
?>
<div></div>
<br>
<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						</ul>
					</div>
                    
					<div class="details col-md-6">
						<h3 class="product-title"><?php se($result,"name"); ?></h3>
						<p class="product-description"><?php se($result,"description"); ?></p>
						<h4 class="price">Current Price: <span>$<?php se($result,"cost"); ?></span></h4>
						<h5 class="sizes">Category: <?php se($result,"category"); ?></h5>
						<h5 class="colors">Stock: <?php se($result,"stock"); ?></h5>
						<form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php se($result, "id");?>"/>
                                <input type="hidden" name="action" value="add"/>
                                <input type="number" name="desired_quantity" value="1" min="1" max="<?php se($result, "stock");?>"/>
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

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>