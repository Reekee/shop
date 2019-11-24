<?php
    if( isset($_POST["btn-del"]) ) { // มีการกดปุ่ม ลบ ไม
        $product_id = $_POST["btn-del"];
        $sql = "DELETE FROM product WHERE product_id='".$product_id."' ";
        $result = $conn->query($sql);

        $dir = "files/product/";
        if( file_exists($dir.$product_id.".jpg") ) unlink($dir.$product_id.".jpg");
        if( file_exists($dir.$product_id.".png") ) unlink($dir.$product_id.".png");
        if( file_exists($dir.$product_id.".gif") ) unlink($dir.$product_id.".gif");

        alert('ลบข้อมูลสำเร็จ');
        linkTo("./?page=product");
    }
?>
<script type="text/javascript">
    function confirmDel() {
        if( confirm("คุณแน่ใจต้องการลบข้อมูลนี้ใช่่หรือไม่ ?") ) {
            return true;
        } else {
            return false;
        }
    }
</script>
<table class="table">
    <tr>
        <th>ลำดับ</th>
        <th>ชื่อสินค้า</th>
        <th>จำนวนที่รับ</th>
        <th>จำนวนที่ขาย</th>
        <th>จำนวนคงเหลือ</th>
        <th></th>
    </tr>
    <?php
        $sql = "
            SELECT 
                *,
                (
                    SELECT IFNULL(SUM(receive.amount_receive),0) FROM receive WHERE receive.product_id=product.product_id
                ) as receive,
                (
                    SELECT IFNULL(SUM(sale.amount_sale),0) FROM sale WHERE sale.product_id=product.product_id
                ) as sale
            FROM product
        ";
        $result = $conn->query($sql);
        $order = 1;
        while($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <td>'.$order.'</td>
                    <td>'.$row["product_name"].'</td>
                    <td>'.$row["receive"].'</td>
                    <td>'.$row["sale"].'</td>
                    <td>'.($row["receive"]-$row["sale"]).'</td>
                    <td>
                        <a href="./?page=receive-add&product_id='.$row["product_id"].'" class="btn btn-success">เพิ่มจำนวนสินค้า</a>
                    </td>
                </tr>
            ';
            $order++;
        }
    ?>
</table>