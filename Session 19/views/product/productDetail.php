 <section class="content-header">
  <h1>
    Product Data Table
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Product</a></li>
    <li class="active">Product Detail</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Product Detail Data Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<a href="index.php?controller=products&action=Add"><button type="button" class="btn btn-block btn-success">Add New Product</button></a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Id</th>
              <th>Category</th>
              <th>Name</th>
              <th>Price</th>
              <th>Description</th>
              <th>Image</th>
              <th>Created</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            	<?php 
					if ($getProductsDetail->num_rows > 0) {
						while ($row = $getProductsDetail->fetch_assoc()) {
							$id = $row['id'];
				?>
				<tr>
					<td><?php echo $row['id']?></td>
          <td><?php echo $row['cat_name']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['price']?></td>
					<td><?php echo $row['description']?></td>
					<td><img width='100px' height='100px' alt='Image' src='./uploads/<?php echo $row['image']?>'></td>
					<td><?php echo $row['created']?></td>
					<td>
            <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger<?php echo $id ?>">DELETE</button>
              <div class="modal modal-danger fade" id="modal-danger<?php echo $id ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure &hellip;</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                      <a href="index.php?controller=products&action=productsDelete&id=<?php echo $id?>">
                        <button class="btn btn-outline">Delete Now</button>
                      </a>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
        <!-- /.modal -->
            <br>
            <a href="index.php?controller=products&action=productsEdit&id=<?php echo $id?>">
              <button type="button" class="btn btn-block btn-primary btn-sm">EDIT</button>
            </a>
          </td>
				</tr>
				<?php							
					}
					} else {
						echo "No product found";
					}
				 ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Id</th>
              <th>Id Category</th>
              <th>Name</th>
              <th>Price</th>
              <th>Description</th>
              <th>Image</th>
              <th>Created</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>