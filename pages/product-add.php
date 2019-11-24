<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="product_name">ชื่อสินค้า</label>
      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="ระบุชื่อสินค้า">
    </div>
    <div class="form-group col-md-6">
      <label for="price">ราคาสินค้า</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="ระบุราคาสินค้า">
    </div>
  </div>
  <div class="form-group">
    <label for="img">เลือกรูปสินค้า</label>
    <input type="file" class="form-control-file" id="img" name="img">
  </div>
  <button type="submit" class="btn btn-success">บันทึกสินค้า</button>
</form>