<?php
	include 'header.php';
	include 'controller/home_controller.php';?>
	<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- <ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="index.php?controller=news&action=listNews">News</a></li>
		<li><a href="index.php?controller=products&action=listProducts">Products</a></li>
	</ul> -->
	<?php  
		$handleRequest = new HomeController();
		$handleRequest->handleRequest(); 
	?>
  </div>
 
<?php include 'footer.php'?>