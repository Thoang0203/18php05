<?php 
	include 'header.php';
 ?>
<a href="add_products.php">Add product</a>
<br>
<?php 
// ket noi database
include 'config/connect.php';
$sql = "SELECT products.id, products.name, product_categories.name as category_name FROM products INNER JOIN product_categories ON 
products.category_id = product_categories.id";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$id = $row['id'];
		echo $row['id'].' - '.$row['name'].' - '.$row['category_name'];
		echo "<a href='delete_product.php?idDelete=$id'>DELETE</a>";
		echo " | <a href='edit_product.php?idEdit=$id'>EDIT</a>";
		echo "<br>";
	}
} else {
	echo "No product category";
}
include 'footer.php';
?>