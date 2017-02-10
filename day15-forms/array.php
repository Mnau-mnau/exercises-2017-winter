<?php
$order = array(
	array(
		'item' => 'macbook air',
		'price' => 234567890,
	),
	array(
		'item' => 'apple tv',
		'price' => 23456789,
	),
	array(
		'item' => 'router',
		'price' => 2345,
	),
	array(
		'item' => 'thing',
		'price' => 234,
	),
	array(
		'item' => 'green dude',
		'price' => 23,
	),
);

$total = 0;
foreach ($order as $prod) {
	$total = $total + $prod['price'];
	echo "buying " . $prod['item'] . " for " . $prod['price'] . "<br>";
}
echo $total;