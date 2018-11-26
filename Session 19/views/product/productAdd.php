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
	<form role="form" name="AddProduct" method="POST" action="#" enctype="multipart/form-data">
	  <div class="box-body">
	  	<!-- <div class="form-group">
	      <label>Category product ID: </label>
	      <a class="err" style="color: red"><?php echo $idCatErr ?></a><br>
	      <input type="number" name="idcat" class="form-control" placeholder="Enter id cat">
	    </div> -->
	    <div class="form-group">
          <label>Category product ID: </label>
          <select class="form-control" name="idcat">
          	<?php 
          	if ($getProductsCat->num_rows > 0) { 
				while ($row = $getProductsCat->fetch_assoc()) {
					$catID = $row['catID'];
					$name = $row['cat_name'];
			?>
            <option value="<?php echo $catID ?>"><?php echo $name ?></option>
            <?php 
            	}
            }
             ?>
          </select>
        </div>
	  	<div class="form-group">
	      <label>Name product: </label>
	      <a class="err" style="color: red"><?php echo $nameErr ?></a><br>
	      <input type="text" name="name" class="form-control" placeholder="Enter name">
	    </div>
	    <div class="form-group">
	      <label>Price: </label>
	      <a class="err" style="color: red"><?php echo $priceErr ?></a><br>
	      <input type="number" name="price" class="form-control" placeholder="Enter price">
	    </div>
	    <div class="form-group">
	      <label>Description: </label>
	      <a class="err" style="color: red"><?php echo $desErr ?></a><br>
	      <textarea name="des" class="form-control"></textarea>
	    </div>
	    <div class="form-group">
	      <label>Image: </label>
	      <a class="err" style="color: red"><?php echo $imageErr ?></a><br>
	      <input type="file" name="image">
	    </div>
	  </div>
	  <!-- /.box-body -->

	  <div class="box-footer" align="center">
	    <button type="submit" name="addProduct" class="btn btn-primary">Submit</button>
	  </div>
	</form>
</div>