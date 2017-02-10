<?php
require_once './shared/database.php';

$db = new Database();
$product = $db->getproduct($_POST['id']);
echo 'You are buying this:';
echo htmlspecialchars($product['name']);
echo htmlspecialchars($product['price']);
?>
<form action="checkout.php" method="post">
<input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
<input type="submit" value="Check out">
</form>