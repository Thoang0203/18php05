<?php 
// ket noi database
include 'config/connect.php';
include 'function.php';
if (isset($_POST['add_category'])) {
	$name = $_POST['name'];
	$sql = "INSERT INTO product_categories(name) 
				VALUES('$name')";
	mysqli_query($connect, $sql);
	// chuyen trang
	redirectPage('list_product_category.php');
}
?>
<h1>Add category</h1>
<form name="AddCategory" action="#" method="post" enctype="multipart/form-data">
	<p>Name:<input type="text" name="name"></p>
	<p><input type="submit" name="add_category" value="Add category"></p>
</form>