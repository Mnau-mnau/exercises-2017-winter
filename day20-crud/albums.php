<?php
require_once 'database.php';

if ($_POST) {
	$stmt = $db->prepare('INSERT INTO albums (name, id_owner) VALUES (?, ?)');
	$stmt->execute([$_POST['name'], $_POST['owner']]);
	header('Location: albums.php?status=ok');
}
if (isset($_GET['status']) && $_GET['status'] == 'ok') {
	echo 'OK';
}

$stmt = $db->prepare('SELECT id, firstname, lastname FROM users ORDER BY lastname, firstname');
$stmt->execute();
$owners = [];
foreach ($stmt as $value) {
	$owners[$value['id']] = $value['firstname'] . ' ' . $value['lastname'];
}
?>
<form action="" method="post">
Name: <input name="name">
Owner: <select name="owner">
<?php
foreach ($owners as $id => $name) {
	echo "<option value=$id>$name</option>";
}
?>
</select>
<input type="submit">
</form>
