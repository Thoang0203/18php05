<?php 
	include('model/users_model.php');
	
	class UserController
	{
		
		public function usersHandleRequest($action)
		{
			switch ($action) {
					case 'login':
						$this->login();
						break;
					case 'logout':
						$this->logout();
						break;
					case 'register':
						$this->register();
						break;
					case 'listUsers':
						if (!isset($_SESSION['username'])) {
							header("Location: login.php");
						}
						if ($_SESSION['role'] != 'admin') {
							echo "Bạn không có quyền này";
							exit();
						}
						$this->listUsers();
						break;
					case 'usersDetail':
						$this->usersDetail();
						break;
					case 'usersDelete':
						$this->deleteUser();
						break;
					// case 'usersEdit':
					// 	$this->editUser();
					// 	break;
					// case 'Add':
					// 	$this->addUser();
					// 	break;
				}
		}
		public function login(){
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
					header('Location: login.php');
				}
			}
			// include 'views/users/login.php';
		}
		public function logout(){
			session_unset();
			header("Location: index.php");
		}
		public function register(){
			$email = $name = $password = '';
			$nameErr = $priceErr = $desErr = $imageErr = '';
			$check = true;
			function test_input($data) {
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
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
					$priceErr = "Please type email!";
				} else {
					$email = test_input($_POST['email']);
				}

				if (empty($_POST['password'])) {
					$check = false;
					$desErr = "Please type password!";
				} else {
					$password_tmp = test_input($_POST['password']);
					$password = md5($password_tmp);
				}
				$avatar = $_FILES['avatar'];
				if ($avatar == null) {
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
		public function listUsers(){
			$usersList = new UsersModel();
			$getUsersList = $usersList->getUsersList();
			include 'views/users/userList.php';
		}
		public function usersDetail(){
			$ID = $_GET['id'];
			$usersDetail = new UsersModel();
			$getUsersDetail = $usersDetail->getUsersDetail($ID);
			include 'views/users/userDetail.php';
		}
		public function deleteUser(){
			$ID = $_GET['id'];
			$usersDetail = new UsersModel();
			$getUsersDetail = $usersDetail->getUsersDetail($ID);
			$imageDel = $getUsersDetail->fetch_assoc()["avatar"];
			unlink('uploads/avatar/'.$imageDel);
			$usersDelete = new UsersModel();
			$getUsersDelete = $usersDelete->getUsersDelete($ID);
			$usersList = new UsersModel();
			$getUsersList = $usersList->getUsersList();
			header('Location: index.php?controller=users&action=listUsers');
		}
		// public function editUser(){
		// 	$catID = $name = $price = $des = '';
		// 	$idCatErr = $nameErr = $priceErr = $desErr = $imageErr = '';
		// 	$check = true;
		// 	$imageEdit = '';
		// 	function test_input($data) {
		// 	  $data = stripslashes($data);
		// 	  $data = htmlspecialchars($data);
		// 	  return $data;
		// 	}
		// 	$ID = $_GET['id'];
		// 	$usersDetail = new UsersModel();
		// 	$getUsersDetail = $usersDetail->getUsersDetail($ID);
		// 	if ($getsDetailToEdit != null) {
		// 		while ($row = $getUsersDetailToEdit->fetch_assoc()) {
		// 			// var_dump($row);
		// 			$id = $row['id'];
		// 			$catID = $row['catID'];
		// 			$imageEdit = $row['image'];
		// 			$name = $row['name'];
		// 			$cat_name = $row['cat_name'];
		// 			$price = $row['price'];
		// 			$des = $row['description'];

		// 			$allCatNotById = new UsersModel();
		// 			$getAllCatNotById = $allCatNotById->getAllCatNotById($catID);
		// 			include 'views//Edit.php';
		// 		}
		// 	}
		// 	if (isset($_POST['edit'])) {
		// 		$catID = $_POST['idcat'];
		// 		if (empty($_POST['name'])) {
		// 			$check = false;
		// 			$nameErr = "Please type name!";
		// 		} else {
		// 			$name = test_input($_POST['name']);
		// 		}
		// 		var_dump($name);
		// 		if (empty($_POST['price'])) {
		// 			$check = false;
		// 			$priceErr = "Please type price!";
		// 		} else {
		// 			$price = test_input($_POST['price']);
		// 		}

		// 		if (empty($_POST['des'])) {
		// 			$check = false;
		// 			$desErr = "Please type des!";
		// 		} else {
		// 			$des = test_input($_POST['des']);
		// 		}
		// 		if ($_FILES['image']['error'] != 0) {
		// 			$nameImage = $imageEdit;
		// 		} elseif($_FILES['image'] != null){
		// 			var_dump($check);
		// 			$image = $_FILES['image'];
		// 			if ($image["type"] != "image/jpg" && $image["type"] != "image/jpeg" && $image["type"] != "image/png" && $image["type"] != "image/gif") {
		// 				$check = false;
		// 				$imageErr = 'Only allow image file!';
		// 			} elseif ($image["size"] > 5242880) {
		// 				$check = false;
		// 				$imageErr = 'Only allow size image under 5MB!';
		// 			}
		// 			if($check){
		// 				unlink('uploads/'.$imageEdit);
		// 				$nameImage = uniqid().'-'.$image['name'];
		// 				$pathSave = 'uploads/'.$nameImage;
		// 				move_uploaded_file($image['tmp_name'], $pathSave);
		// 			}
		// 		}

		// 		if ($check) {
		// 			// unlink($imageEdit);
		// 			$sEdit = new UsersModel();
		// 			$getsEdit = $sEdit->getsEdit($ID, $catID, $name, $price, $des, $nameImage);	
		// 			header("Location: index.php?controller=s&action=lists");
		// 		}

		// 	}
		// }
		// public function addUser(){
		// 	$catID = $name = $price = $des = '';
		// 	$nameErr = $priceErr = $desErr = $imageErr = '';
		// 	$check = true;
		// 	function test_input($data) {
		// 	  $data = stripslashes($data);
		// 	  $data = htmlspecialchars($data);
		// 	  return $data;
		// 	}
		// 	if (isset($_POST['add'])) {
		// 		$catID = $_POST['idcat'];

		// 		if (empty($_POST['name'])) {
		// 			$check = false;
		// 			$nameErr = "Please type name!";
		// 		} else {
		// 			$name = test_input($_POST['name']);
		// 		}

		// 		if (empty($_POST['price'])) {
		// 			$check = false;
		// 			$priceErr = "Please type price!";
		// 		} else {
		// 			$price = test_input($_POST['price']);
		// 		}

		// 		if (empty($_POST['des'])) {
		// 			$check = false;
		// 			$desErr = "Please type des!";
		// 		} else {
		// 			$des = test_input($_POST['des']);
		// 		}
		// 		$image = $_FILES['image'];
		// 		// var_dump($image);
		// 		if ($image == null) {
		// 			$check = false;
		// 			$imageErr = "Please upload file!";
		// 		} elseif ($image["type"] != "image/jpg" && $image["type"] != "image/jpeg" && $image["type"] != "image/png" && $image["type"] != "image/gif") {
		// 			$check = false;
		// 			$imageErr = 'Only allow image file!';
		// 		} elseif ($image["size"] > 5242880) {
		// 			$check = false;
		// 			$imageErr = 'Only allow size image under 5MB!';
		// 		}
				
		// 		if ($check) {
		// 			$nameImage = uniqid().'-'.$image['name'];
		// 			$pathSave = 'uploads/'.$nameImage;
		// 			move_uploaded_file($image['tmp_name'], $pathSave);
		// 			$sAdd = new UsersModel();
		// 			$getsAdd = $sAdd->getsAdd($catID, $name, $price, $des, $nameImage);
		// 			header("Location: index.php?controller=s&action=lists");
		// 		}

		// 	}
		// 	$sCat = new UsersModel();
		// 	$getsCat = $sCat->getAllCat();
		// 	include 'views//Add.php';
		// }
	}

 ?>