<?php
require_once '../shared/database.php';

$db = new Database();
$products = $db->getproducts();

foreach ($products as $product) {
	echo 'Name: ' . htmlspecialchars($product['name']) . '<br>';
	echo 'Price: ' . htmlspecialchars($product['price']) . '<br>';
	echo 'Size: ' . htmlspecialchars($product['size']) . '<br>';
	echo 'Color: ' . htmlspecialchars($product['color']) . '<br><hr>';
}
?>
<a href="addproduct.php">Add new</a>