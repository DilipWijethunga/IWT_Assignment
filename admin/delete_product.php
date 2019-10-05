<?php
require_once "../init.php";

if(!$user||$user['u_type']!='admin'){
    header("Location: login.php");
    die;
}

$itemId = $_GET['itemId'];

$db->query("DELETE FROM product_has_types WHERE prd_id= $itemId");

$db->query("DELETE FROM products WHERE prd_id = $itemId");

header("Location: products.php?delete=yes");
die;