<?php 
	include 'config/connect.php';
	include 'model/users_model.php';

	/**
	 * 
	 */
	class RegisterController
	{
		
		public function handleRequestRegister() {
			$email = $name = $password = '';
			$nameErr = $emailErr = $passwordErr = $imageErr = '';
			$check = true;
			function test_input($data) {
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			$action = isset($_GET['action'])?$_GET['action']:'';
			if ($action == 'register') {
				if (isset($_POST['register'])) {
					//$catID = $_POST['idcat'];
					if (empty($_POST['name'])) {
						$check = false;
						$nameErr = "Please type name!";
					} else {
						$name = test_input($_POST['name']);
					}

					if (empty($_POST['email'])) {
						$check = false;
						$emailErr = "Please type email!";
					} else {
						$email = test_input($_POST['email']);
					}

					if (empty($_POST['password'])) {
						$check = false;
						$passwordErr = "Please type password!";
					} else {
						$password_tmp = test_input($_POST['password']);
						$password = md5($password_tmp);
					}
					$avatar = $_FILES['avatar'];
					if ($avatar["error"] != 0) {
						$check = false;
						$imageErr = "Please upload file!";
					} elseif ($avatar["type"] != "image/jpg" && $avatar["type"] != "image/jpeg" && $avatar["type"] != "image/png" && $avatar["type"] != "image/gif") {
						$check = false;
						$imageErr = 'Only allow image file!';
					} elseif ($avatar["size"] > 5242880) {
						$check = false;
						$imageErr = 'Only allow size image under 5MB!';
					}
					
					if ($check) {
						$nameImage = uniqid().'-'.$avatar['name'];
						$pathSave = 'uploads/avatar/'.$nameImage;
						move_uploaded_file($avatar['tmp_name'], $pathSave);
						$usersAdd = new UsersModel();
						$registerNewUser = $usersAdd->addUserByRegister($name, $email, $password, $nameImage);
						header("Location: login.php");
					}

				}

			}
			include 'views/users/registerView.php';
		}
	}
 ?>