<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "db_shop";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->query("SET NAMES utf8");

    function linkTo($url) {
        echo '
			<script>
				location.href = "'.$url.'";
			</script>
		';
    }
    function alert($message) {
        echo '
            <script>
                alert("'.$message.'");
            </script>
        ';
    }