<?php
session_start();
require_once './shared/database.php';
$db = new Database();
$products = $db->getproducts();

if ($_POST) {
	if (!isset($_SESSION['products'])) {
		$_SESSION['products'] = [];
	}
	$_SESSION['products'][] = $_POST['id'];
	header('Location: index.php');
}

require './shared/header.php';
?>
<h1>Foo site, buy some foo</h1>
<?php
foreach ($products as $product) {
	echo 'Name: ' . htmlspecialchars($product['name']) . '<br>';
	echo 'Price: ' . htmlspecialchars($product['price']) . '<br>';
	echo 'Size: ' . htmlspecialchars($product['size']) . '<br>';
	echo 'Color: ' . htmlspecialchars($product['color']) . '<br>';
	echo '<form action="" method="post">'
		. '<input type="hidden" name="id" value="' . htmlspecialchars($product['id']) . '">'
		. '<input type="submit" value="Buy this">'
		. '</form><hr>';
}
?>
