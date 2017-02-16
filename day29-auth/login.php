<?php
require_once './shared/database.php';
$db = new Database();

if ($_POST) {
	$user = $db->getuserbyemail($_POST['email']);
	if (empty($user)) {
		echo 'WRONG USER';
	} elseif (password_verify($_POST['password'], $user['password'])) {
		session_start();
		$_SESSION['userid'] = $user['id'];
		header('Location: index.php');
	} else {
		echo 'WRONG PASSWORDDDD!!!!!';
	}
}
?>

<form action="" method="post">
email <input type="email" name="email"><br>
pw <input type="password" name="password"><br>
<input type="submit">
</form>
