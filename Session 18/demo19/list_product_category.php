<?php 
	include 'header.php';
 ?>
<div class="content-wrapper">
<a href="add_product_category.php">Add product category</a>
<br>
<section class="content-header">
      <h1>
        Product Categories
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	<?php 
						// ket noi database
						include 'config/connect.php';
						$sql = "SELECT * FROM product_categories";
						$result = mysqli_query($connect, $sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								$id = $row['id'];
						?>
						<tr>
							<td><?php echo $row['id'] ?></td>
							<td><?php echo $row['name'] ?></td>
							<td>
								<a href='edit_product_category.php?idEdit=$id'>
									<button type="button" class="btn btn-block btn-primary">EDIT</button>
								</a>
								<a href='delete_product_category.php?idDelete=$id'>
									<button type="button" class="btn btn-block btn-danger">DELETE</button>
								</a>
							</td>
						</tr>
						<?php
							}
						} else {
							echo "No product category";
						}
					?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
// // ket noi database
// include 'config/connect.php';
// $sql = "SELECT * FROM product_categories";
// $result = mysqli_query($connect, $sql);
// if ($result->num_rows > 0) {
// 	while ($row = $result->fetch_assoc()) {
// 		$id = $row['id'];
// 		echo $row['id'].'-'.$row['name'];
// 		echo "<a href='delete_product_category.php?idDelete=$id'>DELETE</a>";
// 		echo " | <a href='edit_product_category.php?idEdit=$id'>EDIT</a>";
// 		echo "<br>";
// 	}
// } else {
// 	echo "No product category";
// }
// echo '</div>';
include 'footer.php';
?>
