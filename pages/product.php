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
                        <img width="50" src="files/product/'.$row["img"].'?time='.time().'">
                    </td>
                    <td>
                        <a href="./?page=product-edit&product_id='.$row["product_id"].'" class="btn btn-warning">แก้ไข</a>
                        <form action="" method="post" class="d-inline" onSubmit="return confirmDel()">
                            <button type="submit" name="btn-del" value="'.$row["product_id"].'" class="btn btn-danger">ลบ</button>
                        </form>
                    </td>
                </tr>
            ';
            $order++;
        }
    ?>
</table>