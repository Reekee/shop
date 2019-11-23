<table class="table">
    <tr>
        <th>ลำดับ</th>
        <th>ชื่อ-นามสกุล</th>
        <th>ชื่อผู้ใช้งาน</th>
    </tr>
    <?php
        $sql = "SELECT * FROM admin";
        $result = $conn->query($sql);
        $order = 1;
        while($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <td>'.$order.'</td>
                    <td>'.$row["admin_name"].' '.$row["admin_lname"].'</td>
                    <td>'.$row["username"].'</td>
                </tr>
            ';
            $order++;
        }
    ?>
</table>