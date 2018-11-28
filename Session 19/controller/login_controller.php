<?php 
	include 'config/connect.php';
	include 'model/users_model.php';

	class LoginController {
		public function handleRequest()
		{
			$controller = isset($_GET['controller'])?$_GET['controller']:'login';
			$action = isset($_GET['action'])?$_GET['action']:'login';
			if ($controller == 'login' && $action == 'login') {
				if (isset($_POST['login'])){
					$username = $_POST['username'];
					$password = md5($_POST['password']);
					$user = new UsersModel();
					$checkLogin	= $user->checkLogin($username, $password);
					if (!is_null($checkLogin)) {
						$_SESSION['username'] = $checkLogin['name'];
						$_SESSION['role'] = $checkLogin['role'];
					
						header("Location: index.php");
					} else {
						$err = "Sai username hoặc password";
						include 'login.php';
					}
				}
			// include 'views/users/login.php';
			}
		}
	}
 ?>