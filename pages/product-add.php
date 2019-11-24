<?php
    if( isset($_POST['btn-submit']) ) { // เช็คว่ามีการกดปุ่ม "บันทึกสินค้า" ไม่
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $imgf = $_FILES['imgf'];

        $product_id = generateId("product", "product_id");

        $type = strtolower(pathinfo($imgf["name"], PATHINFO_EXTENSION));
        $img = $product_id.".".$type;

        $sql = "
            INSERT INTO `product`(
                `product_id`, 
                `product_name`, 
                `price`, 
                `img`
            ) VALUES (
                '".$product_id."',
                '".$product_name."',
                '".$price."',
                '".$img."'
            )
        ";
        $result = $conn->query($sql);
        $dir = "files/product/";
        move_uploaded_file($imgf["tmp_name"], $dir.$img);
        alert('เพิ่มสินค้าเรียบร้อย');
        linkTo("./?page=product");
    }
?>



<form action="" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="product_name">ชื่อสินค้า</label>
      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="ระบุชื่อสินค้า" required>
    </div>
    <div class="form-group col-md-6">
      <label for="price">ราคาสินค้า</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="ระบุราคาสินค้า" required>
    </div>
  </div>
  <div class="form-group">
    <label for="imgf">เลือกรูปสินค้า</label>
    <input type="file" class="form-control-file" id="imgf" name="imgf" required>
  </div>
  <button type="submit" name="btn-submit" class="btn btn-success">บันทึกสินค้า</button>
</form>