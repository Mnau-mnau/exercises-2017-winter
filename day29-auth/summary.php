<?php
require_once './shared/database.php';

$db = new Database();

require './shared/header.php';

session_start();
foreach ($_SESSION['products'] as $id) {
	$product = $db->getproduct($id);
	echo 'You are buying this:';
	echo htmlspecialchars($product['name']);
	echo htmlspecialchars($product['price']);
	echo '<hr>';
}
?>
<form action="checkout.php" method="post">
<input type="submit" value="Check out" name="submit">
</form>
