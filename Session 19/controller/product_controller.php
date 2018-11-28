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
						if (!isset($_SESSION['username'])) {
							header("Location: login.php");
						}
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
			$productsDetail = new ProductsModel();
			$getProductsDetail = $productsDetail->getProductsDetail($productID);
			$imageDel = $getProductsDetail->fetch_assoc()["image"];
			unlink('uploads/'.$imageDel);
			$productsDelete = new ProductsModel();
			$getProductsDelete = $productsDelete->getProductsDelete($productID);
			$productsList = new ProductsModel();
			$getProductsList = $productsList->getProductsList();
			include 'views/product/productList.php';
		}
		public function editProduct(){
			$catID = $name = $price = $des = '';
			$idCatErr = $nameErr = $priceErr = $desErr = $imageErr = '';
			$check = true;
			$imageEdit = '';
			function test_input($data) {
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			$productID = $_GET['id'];
			$productsDetailToEdit = new ProductsModel();
			$getProductsDetailToEdit = $productsDetailToEdit->getProductsDetail($productID);
			if ($getProductsDetailToEdit != null) {
				while ($row = $getProductsDetailToEdit->fetch_assoc()) {
					// var_dump($row);
					$id = $row['id'];
					$catID = $row['catID'];
					$imageEdit = $row['image'];
					$name = $row['name'];
					$cat_name = $row['cat_name'];
					$price = $row['price'];
					$des = $row['description'];

					$allCatNotById = new ProductsModel();
					$getAllCatNotById = $allCatNotById->getAllCatNotById($catID);
					include 'views/product/productEdit.php';
				}
			}
			if (isset($_POST['edit'])) {
				$catID = $_POST['idcat'];
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
				if ($_FILES['image']['error'] != 0) {
					$nameImage = $imageEdit;
				} elseif($_FILES['image'] != null){
					var_dump($check);
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

				if ($check) {
					// unlink($imageEdit);
					$productsEdit = new ProductsModel();
					$getProductsEdit = $productsEdit->getProductsEdit($productID, $catID, $name, $price, $des, $nameImage);	
					header("Location: index.php?controller=products&action=listProducts");
				}

			}
		}
		public function addProduct(){
			$catID = $name = $price = $des = '';
			$nameErr = $priceErr = $desErr = $imageErr = '';
			$check = true;
			function test_input($data) {
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			if (isset($_POST['addProduct'])) {
				$catID = $_POST['idcat'];

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
					$getProductsAdd = $productsAdd->getProductsAdd($catID, $name, $price, $des, $nameImage);
					header("Location: index.php?controller=products&action=listProducts");
				}

			}
			$productsCat = new ProductsModel();
			$getProductsCat = $productsCat->getAllCat();
			include 'views/product/productAdd.php';
		}
	}
?>