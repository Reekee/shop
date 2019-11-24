<?php
    $product_id = $_GET['product_id'];

    $sql = "
      SELECT * FROM product WHERE product_id='".$product_id."'
    ";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();

    //print_r($row);


    if( isset($_POST['btn-submit']) ) { // เช็คว่ามีการกดปุ่ม "บันทึกสินค้า" ไม่
        $product_id = $product_id;
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $imgf = $_FILES['imgf'];

        $type = strtolower(pathinfo($imgf["name"], PATHINFO_EXTENSION));
        $update_img = "";
        if( !$type=="" ) {
            $img = $product_id.".".$type;
            $update_img = ", img='".$img."'";
        }
        $sql = "
            UPDATE `product` SET
                `product_name`='".$product_name."', 
                `price`='".$price."'
                ".$update_img."
            WHERE product_id='".$product_id."'
        ";
        $result = $conn->query($sql);
        $dir = "files/product/";
        if( !$type=="" ) {
            unlink($dir.$product["img"]);
            move_uploaded_file($imgf["tmp_name"], $dir.$img);
        }
        alert('แก้ไขสินค้าเรียบร้อย');
        linkTo("./?page=product");
    }
?>



<form action="" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="product_name">ชื่อสินค้า</label>
      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="ระบุชื่อสินค้า" value="<?php echo $product["product_name"]; ?>" required>
    </div>
    <div class="form-group col-md-6">
      <label for="price">ราคาสินค้า</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="ระบุราคาสินค้า" value="<?php echo $product["price"]; ?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="imgf">เลือกรูปสินค้า</label>
    <input type="file" class="form-control-file" id="imgf" name="imgf">
  </div>
  <button type="submit" name="btn-submit" class="btn btn-warning">แก้ไขสินค้า</button>
</form>