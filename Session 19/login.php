<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
   <link rel="stylesheet" href="./vendor/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./vendor/css/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./vendor/css/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="./vendor/css/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./vendor/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./vendor/css/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="icon" type="image" href="public/image/logo-dao-hai-tac.png">
</head>
<body class="hold-transition login-page">
  <?php  
    include 'controller/login_controller.php';
    $handleRequest = new LoginController();
    $handleRequest->handleRequestLogin(); 
  ?>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="./vendor/js/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./vendor/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="./vendor/js/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
