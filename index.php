<?php
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<?php include('header.php'); ?>
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
						$file = $page.'.php';
						if( is_file($file) ) {
							include($file);
						} else {
							include("pagenotfound.php");
							//echo "Page Not Found.";
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>