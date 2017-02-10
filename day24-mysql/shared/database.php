<?php
class Database
{

	protected $db;

	public function __construct()
	{
		$this->db = new PDO('mysql:host=localhost;dbname=bootcamp_eshop;charset=utf8', 'bootcamp', '');
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // remove for production
	}

	public function insertproduct($name, $price, $size, $color)
	{
		$stmt = $this->db->prepare('INSERT INTO products (name, price, size, color) VALUES (?, ?, ?, ?)');
		$stmt->execute([$name, $price, $size, $color]);
		return $this->db->lastInsertId();
	}

	public function getproducts()
	{
		$stmt = $this->db->prepare('SELECT id, name, price, size, color FROM products');
		$stmt->execute();
		return $stmt->fetchAll();
	}


	public function getproduct($id)
	{
		$stmt = $this->db->prepare('SELECT id, name, price, size, color FROM products WHERE id = ?');
		$stmt->execute([$id]);
		return $stmt->fetch();
	}

	public function insertorder($userid)
	{
		$stmt = $this->db->prepare('INSERT INTO orders (user_id, created) VALUES (?, NOW())');
		$stmt->execute([$userid]);
		return $this->db->lastInsertId();
	}

	public function insertproducttoorder($productid, $orderid)
	{
		$stmt = $this->db->prepare('INSERT INTO orders_have_products (product_id, order_id) VALUES (?, ?)');
		$stmt->execute([$productid, $orderid]);
		return $this->db->lastInsertId();
	}

}
