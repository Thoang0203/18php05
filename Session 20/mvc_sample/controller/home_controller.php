<?php 
	include 'model/home_model.php';
	include 'model/product_model.php';

	/**
	 * 
	 */
	class HomeController
	{
		public function handleRequest()
		{
			$controller = isset($_GET['controller'])?$_GET['controller']:'home';
			$action = isset($_GET['action'])?$_GET['action']:'home';
			if ($controller == 'home') {
				switch ($action) {
					case 'value':
						# code...
						break;
					
					default:
						# code...
						break;
				}
			} elseif ($controller == 'products') {
				switch ($action) {
					case 'listProducts':
						$productsList = new ProductsModel();
						$getProductsList = $productsList->getProductsList();
						include 'views/product/productList.php';
						break;
					case 'productsDetail':
						$productID = $_GET['id'];
						$productsDetail = new ProductsModel();
						$getProductsDetail = $productsDetail->getProductsDetail($productID);
						include 'views/product/productDetail.php';
						break;
					case 'productsDelete':
						$productID = $_GET['id'];
						$productsDelete = new ProductsModel();
						$getProductsDelete = $productsDelete->getProductsDelete($productID);
						$productsList = new ProductsModel();
						$getProductsList = $productsList->getProductsList();
						include 'views/product/productList.php';
						break;
					case 'productsEdit':
						$productID = $_GET['id'];
						$productsDetail = new ProductsModel();
						$getProductsDetail = $productsDetail->getProductsDetail($productID);
						include 'views/product/productEdit.php';
						break;
					case 'editProduct':
						$productID = $_GET['id'];
						$productsEdit = new ProductsModel();
						$getProductsEdit = $productsEdit->getProductsEdit($productID, $name, $price, $des, $image);
						break;
					case 'productsAdd':
						$productID = $_GET['id'];
						$productsAdd = new ProductsModel();
						$getProductsAdd = $productsAdd->getProductsAdd($productID);
						include 'views/product/productEdit.php';
						break;
				}
			}
		}
	}
 ?>