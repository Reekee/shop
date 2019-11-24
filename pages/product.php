<div style="margin-bottom: 20px;">
    <a href="./?page=product-add" class="btn btn-success">เพิ่มสินค้า</a>
</div>
<table class="table">
    <tr>
        <th>ลำดับ</th>
        <th>ชื่อสินค้า</th>
        <th>ราคา</th>
        <th>รูปภาพ</th>
        <th></th>
    </tr>
    <?php
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        $order = 1;
        while($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <td>'.$order.'</td>
                    <td>'.$row["product_name"].'</td>
                    <td>'.$row["price"].'</td>
                    <td>
                        <img width="50" src="files/product/'.$row["img"].'">
                    </td>
                    <td>
                        <a href="#" class="btn btn-warning">แก้ไข</a>
                        <a href="#" class="btn btn-danger">ลบ</a>
                    </td>
                </tr>
            ';
            $order++;
        }
    ?>
</table>