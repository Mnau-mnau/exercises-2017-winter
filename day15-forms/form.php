<?php
ini_set('display_errors', 1);
if (!empty($_POST)) {
	$data = array(
		'name' => $_POST['product'],
		'color' => $_POST['color'],
		...
	)
	insert_data($data);
	// store stuff to database
	// PRG post-redirect-get
	// header('Location: form.php');

	echo 'adding product '. $_POST['product'] . ', ';
	if (isset($_POST['color'])) {
		echo $_POST['color'];
	}
	if (isset($_POST['really']) && $_POST['really'] == 'on') {
		echo ', I mean it';
	}
	if (isset($_POST['submit-this'])) {
		echo 'submitting this';
	}
	if (isset($_POST['submit-that'])) {
		echo 'submitting that';
	}
}
?>

<form action="" method="post" enctype="multipart/form-data">
<input type="text" name="product">

Amount:
<input type="text" name="amount">

<label for="really">Really?</label>
<input type="checkbox" name="really" id="really" checked>

Color:
<input type="radio" name="color" value="black" id="color-black"><label for="color-black"> black</label>
<input type="radio" name="color" value="white" id="color-white"><label for="color-white"> white</label>
<hr>
Country:
<select name="country">
	<option value="CZ">Czech Republic</option>
	<option value="BR">Banana Republic</option>
	<option value="NZ">Kiwi Republic</option>
</select>
<hr>
Note:
<textarea name="note">prefilled</textarea>

<input type="submit" name="submit-this" value="Submit this">
<input type="submit" name="submit-that" value="Submit that">
<hr>
A file:
<input type="file" name="lefile">

<button><strong>Sub<em>mit</em></strong></button>
</form>
