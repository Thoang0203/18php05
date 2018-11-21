<style>
	.err { color: #CF4242; }
</style>
<h1>Add Product</h1>
<form name="AddProduct" method="POST" action="#" enctype="multipart/form-data">
	<p>Name product: </p>
	<a class="err"><?php echo $nameErr ?></a><br>
	<input type="text" name="name">
	<br>
	<p>Price: </p>
	<a class="err"><?php echo $priceErr ?></a><br>
	<input type="number" name="price">
	<br>
	<p>Description: </p>
	<a class="err"><?php echo $desErr ?></a><br>
	<textarea name="des"></textarea>
	<br>
	<p>Image: </p>
	<a class="err"><?php echo $imageErr ?></a><br>
	<input type="file" name="image"><br>

	<input type="submit" name="addProduct" value="Submit">
</form>