<?php
    $servername = "172.0.0.211";    // localhost
    $username = "test";             // root
    $password = "1234";             // 1234
    $dbname = "db_shop";            // db_shop
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
    function generateId($table, $feild_id) {
        global $conn;
        $sql = "SELECT MAX(".$feild_id.") as id FROM `".$table."`";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        $id = $data['id'] + 1;
        return $id;
    }