<?php 
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = '18php05_demo';
	$connect = mysqli_connect($server, $username, $password, $database);

	$id = $_GET['id'];
	$sql = "DELETE FROM users WHERE id = $id";
	mysqli_query($connect, $sql);
	//Redirect
	header("Location: List_users.php");
 ?>