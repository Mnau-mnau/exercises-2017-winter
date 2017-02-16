<?php
require_once './shared/database.php';
$db = new Database();

if ($_POST) {
	$userid = $db->insertuser($_POST['name'], $_POST['email'], $_POST['password']);
	session_start();
	$_SESSION['userid'] = $userid;
	header('Location: index.php');
}
?>

<form action="" method="post">
name <input type="text" name="name"><br>
email <input type="email" name="email"><br>
pw <input type="password" name="password"><br>
<input type="submit">
</form>
