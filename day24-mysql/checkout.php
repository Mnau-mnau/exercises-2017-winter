<?php
require_once './shared/database.php';

$db = new Database();
if ($_POST) {
	$orderid = $db->insertorder(1);
	$db->insertproducttoorder($_POST['id'], $orderid);
	header('Location: index.php');
}
