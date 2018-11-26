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
			$this->sql = "SELECT * FROM products 
							INNER JOIN categories
							ON products.catID = categories.catID
							WHERE id = $productID";
			return mysqli_query($this->connect, $this->sql);
		}

		public function getProductsDelete($productID){
			$this->sql = "DELETE FROM products WHERE id = $productID";
			return mysqli_query($this->connect, $this->sql);
		}

		// public function getProductDetailToEdit($productID){
		// 	$this->sql = "SELECT * FROM products 
		// 					INNER JOIN categories
		// 					ON products.catID = categories.catID
		// 					WHERE id = $productID";
		// 	return mysqli_query($this->connect, $this->sql);
		// }

		public function getProductsEdit($productID, $catID, $name, $price, $des, $nameImage){
			$this->sql = "UPDATE products SET catID = '$catID', name = '$name', price = '$price', description = '$des', image = '$nameImage' WHERE id = $productID";
			return mysqli_query($this->connect, $this->sql);
		}

		public function getAllCat(){
			$this->sql = 'SELECT * FROM categories';
			return mysqli_query($this->connect, $this->sql);
		}

		public function getAllCatNotById($catID){
			$this->sql = "SELECT * FROM categories WHERE catID != $catID";
			return mysqli_query($this->connect, $this->sql);
		}
		
		public function getProductsAdd($catID, $name, $price, $des, $nameImage){
			$this->sql = "INSERT INTO products(catID, name, price, description, image) VALUES('$catID', '$name', '$price', '$des', '$nameImage')";
			return mysqli_query($this->connect, $this->sql);
		}
	}
?>