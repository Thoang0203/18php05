<?php 
	include 'model/home_model.php';
	include 'controller/product_controller.php';
	/**
	 * 
	 */
	class HomeController {
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
				$products = new ProductController;
				$products->productHandleRequest($action);
			}
		}
	}
 ?>