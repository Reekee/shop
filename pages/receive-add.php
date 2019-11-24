<?php
    $product_id = $_GET["product_id"];
    $sql = "SELECT * FROM product WHERE product_id='".$product_id."' ";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();

    if( isset($_POST['btn-submit']) ) { // เช็คว่ามีการกดปุ่ม "บันทึกสินค้า" ไม่
        $amount_receive = $_POST['amount_receive'];

        $receive_id = generateId("receive", "receive_id");

        $sql = "
            INSERT INTO `receive`(
                `receive_id`, 
                `product_id`, 
                `amount_receive`
            ) VALUES (
                '".$receive_id."',
                '".$product_id."',
                '".$amount_receive."'
            )
        ";
        $result = $conn->query($sql);
        alert('เพิ่มจำนวนสินค้าเรียบร้อย');
        linkTo("./?page=receive");
    }
?>



<form action="" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="product_name">ชื่อสินค้า</label>
      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="ระบุชื่อสินค้า"  value="<?php echo $product["product_name"]; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="amount_receive">จำนวนที่รับ</label>
      <input type="text" class="form-control" id="amount_receive" name="amount_receive" placeholder="ระบุจำนวนที่รับ" required>
    </div>
  </div>
  <button type="submit" name="btn-submit" class="btn btn-success">บันทึกการรับสินค้า</button>
</form>