<?php
	session_start();
	include_once("php/autoload.php");
	if( !isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
		// echo '
		// 	<script>
		// 		location.href = "./login.php";
		// 	</script>
		// ';
		linkTo("./login.php");
	}
	
	if( isset($_GET["page"]) )
		$page = $_GET["page"];
	else 
		$page = "home";

	// $page = ( isset($_GET["page"]) ) ? $_GET["page"] : 'home';
?>
<!DOCTYPE html>
<html>
<head>
	<title>เว็บไซด์ร้านค้าออนไลน์</title>
	<link rel="stylesheet" href="lib/bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<script src="lib/jquery/jquery-3.3.1.slim.min.js"></script>
	<script src="lib/popper/popper.min.js"></script>
	<script src="lib/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<?php include('master/header.php'); ?>
	<div id="body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						<a href="./" class="list-group-item list-group-item-action <?php if($page=="home") echo 'active'; ?>">หน้าหลัก</a>
						<a href="./?page=product" class="list-group-item list-group-item-action <?php if($page=="product") echo 'active'; ?>">ข้อมูลสินค้า</a>
						<a href="./?page=member" class="list-group-item list-group-item-action <?php if($page=="member") echo 'active'; ?>">รายชื่อลูกค้า</a>
						<a href="./?page=order" class="list-group-item list-group-item-action <?php if($page=="order") echo 'active'; ?>">การสั่งซื้อ</a>
						<a href="./?page=receive" class="list-group-item list-group-item-action <?php if($page=="receive") echo 'active'; ?>">รับสั่งซื้อ</a>
					</div>
				</div>
				<div class="col-md-9">
					<?php
						//echo $page;
						//if($page=="home") include('home.php');
						//else if($page=="product") include('product.php');
						$file = "pages/".$page.'.php';
						if( is_file($file) ) {
							include($file);
						} else {
							include("pages/pagenotfound.php");
							//echo "Page Not Found.";
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php include('master/footer.php'); ?>
</body>
</html>