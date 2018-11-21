<?php
	include 'model/product_model.php';
	/**
	 * 
	 */
	class ProductController
	{
		
		public function productHandleRequest($action)
		{
			switch ($action) {
					case 'listProducts':
						$this->listProducts();
						break;
					case 'productsDetail':
						$this->productDetail();
						break;
					case 'productsDelete':
						$this->deleteProduct();
						break;
					case 'productsEdit':
						$this->editProduct();
						break;
					case 'Add':
						$this->addProduct();
						break;
				}
				}
				public function listProducts(){
					$productsList = new ProductsModel();
					$getProductsList = $productsList->getProductsList();
					include 'views/product/productList.php';
				}
				public function productDetail(){
					$productID = $_GET['id'];
					$productsDetail = new ProductsModel();
					$getProductsDetail = $productsDetail->getProductsDetail($productID);
					include 'views/product/productDetail.php';
				}
				public function deleteProduct(){
					$productID = $_GET['id'];
					$productsDelete = new ProductsModel();
					$getProductsDelete = $productsDelete->getProductsDelete($productID);
					$productsList = new ProductsModel();
					$getProductsList = $productsList->getProductsList();
					include 'views/product/productList.php';
				}
				public function editProduct(){
					$name = $price = $des = '';
					$nameErr = $priceErr = $desErr = $imageErr = '';
					$check = true;
					$imageEdit = '';
					function test_input($data) {
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
					}
					$productID = $_GET['id'];
					$productsDetail = new ProductsModel();
					$getProductsDetail = $productsDetail->getProductsDetail($productID);
					if ($getProductsDetail != null) {
						while ($row = $getProductsDetail->fetch_assoc()) {
							// var_dump($row);
							$id = $row['id'];
							$imageEdit = $row['image'];
							$name = $row['name'];
							$price = $row['price'];
							$des = $row['description'];
							include 'views/product/productEdit.php';
						}
					}
					if (isset($_POST['edit'])) {

						if (empty($_POST['name'])) {
							$check = false;
							$nameErr = "Please type name!";
						} else {
							$name = test_input($_POST['name']);
						}
						var_dump($name);
						if (empty($_POST['price'])) {
							$check = false;
							$priceErr = "Please type price!";
						} else {
							$price = test_input($_POST['price']);
						}

						if (empty($_POST['des'])) {
							$check = false;
							$desErr = "Please type des!";
						} else {
							$des = test_input($_POST['des']);
						}
						var_dump($imageEdit);
						if (empty($_POST['image'])) {
							$nameImage = $imageEdit;
						} elseif($_FILES['image'] != null){
							var_dump($check);
							$check = false;
							$image = $_FILES['image'];
							if ($image["type"] != "image/jpg" && $image["type"] != "image/jpeg" && $image["type"] != "image/png" && $image["type"] != "image/gif") {
								$check = false;
								$imageErr = 'Only allow image file!';
							} elseif ($image["size"] > 5242880) {
								$check = false;
								$imageErr = 'Only allow size image under 5MB!';
							}
							if($check){
								unlink('uploads/'.$imageEdit);
								$nameImage = uniqid().'-'.$image['name'];
								$pathSave = 'uploads/'.$nameImage;
								move_uploaded_file($image['tmp_name'], $pathSave);
							}
						}
						var_dump($check);
						if ($check) {
							// unlink($imageEdit);
							$productsEdit = new ProductsModel();
							$getProductsEdit = $productsEdit->getProductsEdit($productID, $name, $price, $des, $nameImage);	
							// header('Location: views/product/productList.php');
						}

					}
					
				}
				public function addProduct(){
					$name = $price = $des = '';
					$nameErr = $priceErr = $desErr = $imageErr = '';
					$check = true;
					function test_input($data) {
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
					}
					if (isset($_POST['addProduct'])) {
						if (empty($_POST['name'])) {
							$check = false;
							$nameErr = "Please type name!";
						} else {
							$name = test_input($_POST['name']);
						}

						if (empty($_POST['price'])) {
							$check = false;
							$priceErr = "Please type price!";
						} else {
							$price = test_input($_POST['price']);
						}

						if (empty($_POST['des'])) {
							$check = false;
							$desErr = "Please type des!";
						} else {
							$des = test_input($_POST['des']);
						}
						$image = $_FILES['image'];
						// var_dump($image);
						if ($image == null) {
							$check = false;
							$imageErr = "Please upload file!";
						} elseif ($image["type"] != "image/jpg" && $image["type"] != "image/jpeg" && $image["type"] != "image/png" && $image["type"] != "image/gif") {
							$check = false;
							$imageErr = 'Only allow image file!';
						} elseif ($image["size"] > 5242880) {
							$check = false;
							$imageErr = 'Only allow size image under 5MB!';
						}
							
					if ($check) {
						$nameImage = uniqid().'-'.$image['name'];
						$pathSave = 'uploads/'.$nameImage;
						move_uploaded_file($image['tmp_name'], $pathSave);
						$productsAdd = new ProductsModel();
						$getProductsAdd = $productsAdd->getProductsAdd($name, $price, $des, $nameImage);
						header("Location: index.php?controller=products&action=listProducts");
					}

					}
					include 'views/product/productAdd.php';
				}
	}
?>