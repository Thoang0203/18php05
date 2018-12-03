<div class="login-box">
  <div class="login-logo">
    <a href="./index.php"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="login.php?action=login" method="post">
      <a style="color: red;"><?php echo $err ?></a>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="User name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <br><button type="submit" name="login" class="btn btn-primary btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="#">I forgot my password</a><br>
    <br><a href="register.php" class="text-center">Register a new membership</a>
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>