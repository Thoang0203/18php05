<section class="content-header">
  <h1>
    General Form Elements
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Forms</a></li>
    <li class="active">General Elements</li>
  </ol>
</section>
<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Add a new product</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form" name="EditProduct" method="POST" action="#" enctype="multipart/form-data">
	  <div class="box-body">
	  	<div class="form-group">
	      <label>ID product: </label>
	      <input type="text" name="name" class="form-control" value="<?php echo $row['id'] ?>" disabled>
	    </div>
	  	<div class="form-group">
	      <label>Name product: </label>
	      <a class="err" style="color: red"><?php echo $nameErr ?></a><br>
	      <input type="text" name="name" class="form-control" value="<?php echo $row['name']?>" placeholder="Enter name">
	    </div>
	    <div class="form-group">
	      <label>Price: </label>
	      <a class="err" style="color: red"><?php echo $priceErr ?></a><br>
	      <input type="number" name="price" class="form-control" value="<?php echo $row['price']?>" placeholder="Enter price">
	    </div>
	    <div class="form-group">
	      <label>Description: </label>
	      <a class="err" style="color: red"><?php echo $desErr ?></a><br>
	      <textarea name="des" class="form-control"><?php echo $row['description']?></textarea>
	    </div>
	    <div class="form-group">
	      <label>Image: </label>
	      <a class="err" style="color: red"><?php echo $imageErr ?></a><br>
	      <br><img width='100px' height='100px' src='uploads/<?php echo $imageEdit?>'>
	      <input type="file" name="image">
	    </div>
	  </div>
	  <!-- /.box-body -->
	  <div class="box-footer" align="center">
	    <button type="submit" name="edit" class="btn btn-primary">Submit</button>
	  </div>
	</form>
</div>