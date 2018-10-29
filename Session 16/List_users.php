<?php 
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = '18php05_demo';
	$connect = mysqli_connect($server, $username, $password, $database);
	$sql = "SELECT * FROM users";
	$result = mysqli_query($connect, $sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$id = $row['id'];
			echo $row['id'].' - '.$row['name'].' - '.$row['email'].' ';
			echo "<a href='Delete_user.php?id=$id'>DELETE</a> | ";
			echo "<a href='Modify_user.php?id=$id'>MODIFY</a>";
			echo '<br>';
		}
	} else {
		echo "No user";
	}
 ?>