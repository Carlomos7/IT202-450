<?php
require_once(__DIR__ . "/../../lib/functions.php");
error_log("purchase_cart received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$user_id = get_user_id();

$response = ["status" => 400, "message" => "There was a problem completing your purchase"];
http_response_code(400);
if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("SELECT name, c.id as line_id, product_id, desired_quantity, unit_price, (unit_price*desired_quantity) as subtotal FROM Cart_Alt c JOIN Products i on c.product_id = i.id WHERE c.user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $balance = 1;
        $total_cost = 0;
        foreach ($results as $row) {
            $total_cost += (int)se($row, "subtotal", 0, false);
        }
        $balance+= $total_cost;
        if ($balance >= $total_cost) {
            //can purchase
            $db->beginTransaction();
            $stmt = $db->prepare("SELECT max(order_id) as order_id FROM OrderHistory");
            $next_order_id = 0;
            //get next order id
            try {
                $stmt->execute();
                $r = $stmt->fetch(PDO::FETCH_ASSOC);
                $next_order_id = (int)se($r, "order_id", 0, false);
                $next_order_id=$db->lastInsertId();;
            } catch (PDOException $e) {
                error_log("Error fetching order_id: " . var_export($e));
                $db->rollback();
            }
            //deduct product stock (used to determine if out of stock as it'll fail with a constraint violation)
            if ($next_order_id > 0) {
                $stmt = $db->prepare("UPDATE Products 
                set stock = stock - (select IFNULL(desired_quantity, 0) FROM Cart_Alrt WHERE product_id = Products.id and user_id = :uid) 
                WHERE id in (SELECT product_id from Cart_Alt where user_id = :uid)");
                try {
                    $stmt->execute([":uid" => $user_id]);
                } catch (PDOException $e) {
                    error_log("Update stock error: " . var_export($e, true));
                    $response["message"] = "At least one of your items is low on stock and is unable to be purchased";
                    $db->rollback();
                    $next_order_id = 0; //using as a controller
                }
            }
            //map cart to order history
            if ($next_order_id > 0) {
                $stmt = $db->prepare("INSERT INTO OrderHistory (product_id, user_id, desired_quantity, unit_price, order_id) 
                SELECT item_id, user_id, Cart_Alt.desired_quantity, unit_price, :order_id FROM Cart_Alt JOIN Products on Cart_Alt.product_id = Products.id
                 WHERE user_id = :uid");
                try {
                    $stmt->execute([":uid" => $user_id, ":order_id" => $next_order_id]);
                } catch (PDOException $e) {
                    error_log("Error mapping cart data to order history: " . var_export($e, true));
                    $db->rollback();
                    $next_order_id = 0; //using as a controller
                }
            }
            if ($next_order_id > 0) {
                $stmt =  $db->prepare("DELETE from Cart_Alt where user_id = :uid");
                try {
                    $stmt->execute([":uid" => $user_id]);
                } catch (PDOException $e) {
                    error_log("Error deleting cart: " . var_export($e, true));
                    $db->rollback();
                    $next_order_id = 0; // using as a controller
                }
            }
            if ($next_order_id) {
                $db->commit(); //confirm pending changes
                $response["status"] = 200;
                http_response_code(200);
                $response["message"] = "Purchase complete";
            } else {
                $response["status"] = 200;
                http_response_code(200);
            }
        } else {
            $response["status"] = 402;
            http_response_code(200);
            $response["message"] = "You can't afford to purchase your cart";
        }
    } catch (PDOException $e) {
        error_log("Error fetching cart" . var_export($e, true));
    }
} else {
    $response["status"] = 403;
    $response["message"] = "You must be logged in to fetch your cart";
    http_response_code(403);
}
echo json_encode($response);