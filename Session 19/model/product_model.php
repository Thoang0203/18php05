<?php
	include 'config/connect.php';
	
	/**
	 * 
	 */
	class ProductsModel extends ConnectDB
	{
		public function getProductsList(){
			$this->sql = 'SELECT * FROM products';
			return mysqli_query($this->connect, $this->sql);
		}
		public function getProductsDetail($productID){
			$this->sql = "SELECT * FROM products WHERE id = $productID";
			return mysqli_query($this->connect, $this->sql);
		}
		public function getProductsDelete($productID){
			$this->sql = "DELETE FROM products WHERE id = $productID";
			return mysqli_query($this->connect, $this->sql);
		}
		public function getProductsEdit($productID, $name, $price, $des, $nameImage){
			$this->sql = "UPDATE products SET name = '$name', price = '$price', description = '$des', image = '$nameImage' WHERE id = $productID";
			return mysqli_query($this->connect, $this->sql);
		}
		public function getProductsAdd($name, $price, $des, $nameImage){
			$this->sql = "INSERT INTO products(name, price, description, image) VALUES('$name', '$price', '$des', '$nameImage')";
			return mysqli_query($this->connect, $this->sql);
		}
	}
?>