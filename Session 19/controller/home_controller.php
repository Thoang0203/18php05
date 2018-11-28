<?php 
	include 'model/home_model.php';
	include 'config/connect.php';
	include 'controller/product_controller.php';
	include 'controller/users_controller.php';
	/**
	 * 
	 */
	class HomeController {
		public function handleRequest()
		{
			$controller = isset($_GET['controller'])?$_GET['controller']:'home';
			$action = isset($_GET['action'])?$_GET['action']:'home';
			if ($controller == 'home') {
				if (!isset($_SESSION['username'])) {
					header("Location: login.php");
				} else {
					header("Location: index.php?controller=products&action=listProducts");
				}
			} elseif ($controller == 'products') {
				$products = new ProductController;
				$products->productHandleRequest($action);
			}
			elseif ($controller == 'users') {
				$users = new UserController;
				$users->usersHandleRequest($action);
			}
		}
	}
 ?>