<style>
	a { color: #CF4242; }
</style>
<h1>Edit Product</h1>
<form method="POST" action="editProduct" enctype="multipart/form-data">
 	<?php 
		if ($getProductsDetail != null) {
			while ($row = $getProductsDetail->fetch_assoc()) {
				// var_dump($row);
				$imageEdit = 'uploads/'.$row['image'];
	?>
		<input type='text' value='<?php echo $row['id']?>' disabled>
		<p>Name product: </p>
		<a> <?php echo $nameErr?></a>
		<input type='text' name='name' value='<?php echo $row['name']?>' >

		<br><p>Price: </p><a><?php echo $priceErr ?></a>
		<input type='text' name='price' value='<?php echo $row['price']?>'>

		<br><p>Description: </p><a><?php echo $desErr?></a>
		<textarea name='des'><?php echo $row['description']?></textarea>

		<br><p>Image: </p><a><?php echo $imageErr?></a>
		<br><img width='100px' height='100px' src='<?php echo $imageEdit?>'>
		<br><input type='file' name='image'>
	<?php
			}
		}?>
	 <br>
	<input type="submit" name="edit" value="Submit">
 </form>
<?php 
	$check = true;
	if (isset($_POST['edit'])) {
		if (empty($_POST['name'])) {
			$check = false;
			$nameErr = "Please type name!";
		} else {
			$name = test_input($_POST['name']);
		}

		if (empty($_POST['price'])) {
			$check = false;
			$priceErr = "Please type price!";
		} else {
			$price = test_input($_POST['price']);
		}

		if (empty($_POST['des'])) {
			$check = false;
			$desErr = "Please type des!";
		} else {
			$des = test_input($_POST['des']);
		}
		$image = $_FILES['image'];
		if ($image["type"] != "image/jpg" && $image["type"] != "image/jpeg" && $image["type"] != "image/png" && $image["type"] != "image/gif") {
			$check = false;
			$imageErr = 'Only allow image file!';
		} elseif ($image["size"] > 5242880) {
			$check = false;
			$imageErr = 'Only allow size image under 5MB!';
		}
			
	if ($check) {
		// unlink($imageEdit);
		// var_dump($imageEdit);
		$nameImage = uniqid().'-'.$image['name'];
		$pathSave = 'uploads/'.$nameImage;
		move_uploaded_file($image['tmp_name'], $pathSave);
		
		$sql = "UPDATE products 
				SET name = '$name', price = '$price', description = '$des', image = '$nameImage' 
				WHERE id = $id" ;
		mysqli_query($connect, $sql);
		
		header('Location: views/product/productList.php');
	}

	}
	function test_input($data) {
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
 ?>