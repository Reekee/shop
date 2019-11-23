<?php
    session_start();
    include_once("php/autoload.php");
	if( isset($_POST["btn-login"]) ) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "
            SELECT * 
            FROM admin 
            WHERE username='".$username."' 
                AND password='".$password."'
        ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            linkTo("./");
        } else {
            alert("รหัสไม่ถูกต้อง");
        }
    }
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
    <style>
        #frm-login {
            width: 300px;
            margin: auto;
            margin-top: 50px;
            background-color: #d2d2d2;
            padding: 20px;
        }
    </style>
</head>
<body>
    <form action="" method="post" id="frm-login">
        <div class="form-group">
            <label for="username">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="ระบุชื่อผู้ใช้งาน">
        </div>
        <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="ระบุรหัสผ่าน">
        </div>
        <button type="submit" name="btn-login" class="btn btn-primary">เข้าสู่ระบบ</button>
    </form>
</body>
</html>