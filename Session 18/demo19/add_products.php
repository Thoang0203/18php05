<?php 
// ket noi database
include 'config/connect.php';
include 'function.php';
include 'header.php';
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
	<p>Name:<input type="text" name="name"></p>
	<p>Category:
		<select name = "product_category_id">
			<?php //echo $categoryList?>
			<?php 
				while ($row = $result->fetch_assoc()) {
					$id   = $row['id'];
					$name = $row['name'];
					echo "<option value='$id'>$name</option>";
				}
			?>
		</select>
	</p>
	<p><input type="submit" name="add_product" value="Add product"></p>
</form>
<?php 
	include 'footer.php';
 ?>