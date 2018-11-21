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
		public function getProductsEdit($productID, $name, $price, $des, $image){
			$this->sql = "UPDATE products SET name = '$name', price = '$price', description = '$des', image = '$image' WHERE id = $productID";
			return mysqli_query($this->connect, $this->sql);
		}
	}
 ?>