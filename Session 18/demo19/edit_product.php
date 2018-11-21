<?php 
// ket noi database
include 'config/connect.php';
include 'function.php';
$idEdit = $_GET['idEdit'];
// lay thong tin cu cua tin tuc can EDIT
$sql = "SELECT * FROM products WHERE id = $idEdit";
$result = mysqli_query($connect, $sql);
while ($row = $result->fetch_assoc()) {
	$id     = $row['id'];
	$name   = $row['name'];
	$category_id   = $row['category_id'];
}

$sql = "SELECT * FROM product_categories";
$result = mysqli_query($connect, $sql);
// $categoryList = '';
// while ($row = $result->fetch_assoc()) {
// 		$id   = $row['id'];
// 		$name = $row['name'];
// 		$categoryList.="<option value='$id'>$name</option>";

// }

if (isset($_POST['add_product'])) {
	$name = $_POST['name'];
	$product_category_id = $_POST['product_category_id'];
	$sql = "INSERT INTO products(name, category_id) 
				VALUES('$name', $product_category_id)";
	mysqli_query($connect, $sql);
	// chuyen trang
	redirectPage('list_products.php');
}
?>
<h1>Add product</h1>
<form name="AddProduct" action="#" method="post" enctype="multipart/form-data">
	<p>Name:<input type="text" name="name" value="<?php echo $name?>"></p>
	<p>Category:
		<select name = "product_category_id">
			<?php //echo $categoryList?>
			<?php 
				while ($row = $result->fetch_assoc()) {
					$id   = $row['id'];
					$selected = ($category_id == $id)?'selected':'';
					$name = $row['name'];
					echo "<option value='$id' $selected>$name</option>";
				}
			?>
		</select>
	</p>
	<p><input type="submit" name="add_product" value="Add product"></p>
</form>