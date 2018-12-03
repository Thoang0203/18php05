<div class="register-box">
  <div class="register-logo">
    <a href="./index.php"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    <form action="register.php?action=register" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" placeholder="Name">
        <span class="glyphicon glyphicon-user form-control-feedback" style="color: red"><?php echo $nameErr ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback" style="color: red"><?php echo $emailErr ?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback" style="color: red"><?php echo $passwordErr ?></span>
      </div>
      <!-- <div class="form-group has-feedback">
        <input type="password" class="form-control" name="repassword" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div> -->
      <div class="form-group has-feedback">
        <input type="file" class="form-control" name="avatar">
        <span class="glyphicon glyphicon-log-in form-control-feedback" style="color: red"><?php echo $imageErr ?></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <br><button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="login.html" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>