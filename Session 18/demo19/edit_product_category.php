<?php 
	include 'config/connect.php';
	include 'function.php';
	$idEdit = $_GET['idEdit'];
	// lay thong tin cu cua tin tuc can EDIT
	$sql = "SELECT * FROM product_categories WHERE id = $idEdit";
	$result = mysqli_query($connect, $sql);
	while ($row = $result->fetch_assoc()) {
		$id     = $row['id'];
		$name   = $row['name'];
	}
	//Update category
	if (isset($_POST['edit_category'])) {
		$name = $_POST['name'];
		$sql = "UPDATE product_categories SET name = '$name' WHERE id = $idEdit";
		if (mysqli_query($connect, $sql) === TRUE) {
			redirectPage('list_product_category.php');
		}
	}
?>
<h1>Edit category</h1>
<form name="EditCategory" action="edit_product_category.php?idEdit=<?php echo $idEdit?>" method="post" enctype="multipart/form-data">
	<p>Name:<input type="text" name="name" value="<?php echo $name?>"></p>
	<p><input type="submit" name="edit_category" value="Edit category"></p>
</form>