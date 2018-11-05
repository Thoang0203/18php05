<?php 
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = '18php05_demo';
	$connect = mysqli_connect($server, $username, $password, $database);
	$id = $_GET['id'];
	$name = $email = "";
	$nameErr = $emailErr = $modify = "";
	$check = true;
	if (isset($_POST['modify'])) {
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
			$update = "UPDATE users SET name = '$name' , email = '$email' WHERE id = $id;";
			mysqli_query($connect, $update);
			header('Location: List_users.php');
		}
	}
	function test_input($data) {
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
 ?>
<h1>Modify User</h1>
<form method="POST" action="#">
	<?php 
		$sql = "SELECT * FROM users WHERE id = $id";
		$result = mysqli_query($connect, $sql);
		if ($result != null) {
			while ($row = $result->fetch_assoc()) {
				echo "<input type='text' name='name' value='".$row['id']."' disabled>";
				echo "<p>Họ và tên: </p>";
				echo "<a>".$nameErr."</a>";
				echo "<input type='text' name='name' value='".$row['name']."'>";
				echo "<br><p>Email: </p><a>".$emailErr."</a>";
				echo "<input type='text' name='email' value='".$row['email']."'>";
			}
		}
	 ?>
	 <br>
	<input type="submit" name="modify" value="Submit">
</form>

