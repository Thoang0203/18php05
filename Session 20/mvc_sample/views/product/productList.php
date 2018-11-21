<a href="index.php?controller=products&action=Add">Add New Product</a>
<br>
<?php 
	if ($getProductsList->num_rows > 0) {
			while ($row = $getProductsList->fetch_assoc()) {
			$id = $row['id'];
			echo $row['id']." - ".$row['name'];
			echo " <a href='index.php?controller=products&action=productsDetail&id=$id'>DETAIL</a>";
			echo " | <a href='index.php?controller=products&action=productsDelete&id=$id'>DELETE</a>";
			echo " | <a href='index.php?controller=products&action=productsEdit&id=$id'>EDIT</a>";
			echo '<br>';
			}
		} else {
			echo "No product found";
		}
 ?>