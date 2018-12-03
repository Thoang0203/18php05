<section class="content-header">
  <h1>
    User Data Table
    <small>general tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">User</a></li>
    <li class="active">List User</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">User Data Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<a href="index.php?controller=users&action=Add"><button type="button" class="btn btn-block btn-success">Add New User</button></a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Avatar</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            	<?php 
      					if ($getUsersList->num_rows > 0) { 
      						while ($row = $getUsersList->fetch_assoc()) {
      						$id = $row['id'];
      				?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><a href="index.php?controller=users&action=usersDetail&id=<?php echo $id?>"><?php echo $row['name']?></a></td>
					<td><img width='100px' height='100px' alt='Avatar' src='./uploads/avatar/<?php echo $row['avatar']?>'></td>
          <td><?php echo $row['role']?></td>
					<td>
           <!--  <a href="index.php?controller=users&action=usersDelete&id=<?php echo $id?>"> -->
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
                      <a href="index.php?controller=users&action=usersDelete&id=<?php echo $id?>">
                        <button class="btn btn-outline">Delete Now</button>
                      </a>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
        <!-- /.modal -->
            <!-- </a> -->
            <br>
            <a href="index.php?controller=users&action=usersEdit&id=<?php echo $id?>">
              <button type="button" class="btn btn-block btn-primary btn-sm">EDIT</button>
            </a>
          </td>
				</tr>
				<?php							
					}
					} else {
						echo "No User found";
					}
				 ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Image</th>
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