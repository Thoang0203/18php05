<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
</head>
<style>
	.err { color: #CF4242; }
</style>
<body>
	<?php 
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = '18php05_demo';
	$connect = mysqli_connect($server, $username, $password, $database);
	$name = $email = $nameErr = $emailErr = $register = "";
	$check = true;
	if (isset($_POST['modify_user'])) {
		if (empty($_POST["name"])) {
			$check = false;
			$nameErr = "Vui lòng nhập tên của bạn <br>";
		} else {
			$name = test_input($_POST["name"]);
		}
		if (empty($_POST["email"])) {
			$check = false;
			$emailErr = "Vui lòng nhập email <br>";
		} else {
			$email = test_input($_POST["email"]);
		}
		if($check) { 
			$sql = "INSERT INTO users(name, email) VALUES('$name', '$email')";
			mysqli_query($connect, $sql);
			$register = "Đăng ký thành công!";
			echo "<script type='text/javascript'> alert('".$register."');</script>";
		}
	}
	function test_input($data) {
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
 ?>
	<h1>Form Validation</h1>
	<form name="AddUser" method="post" action="#">
		<p>Họ và tên: </p>
		<a class="err"><?php echo $nameErr ?></a>
		<input type="text" name="name">
		<br>
		<p>Email: </p>
		<a class="err"><?php echo $emailErr ?></a>
		<input type="text" name="email"><br>
		<input type="submit" name="modify_user" value="Submit">
	</form>

</body>
</html>