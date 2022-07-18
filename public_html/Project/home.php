<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Welcome to Shop Shop</h1>
<div></div>
<h4>Selection of Products</h4>
<?php
require(__DIR__ ."/shop.php");
?>
<?php

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>