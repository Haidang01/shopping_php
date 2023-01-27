<?php
include 'header.php'; ?>
<div style="width: 50%; margin: 0 auto;" class='container p-5'>
  <h1 class="text-center mb-4">Thêm mới sản phẩm</h1>
  <form>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
      <select class="form-select" id="inputGroupSelect01">
        <option selected>Iphone</option>
        <option value="1">Samsung</option>
        <option value="2">Xiaomi</option>
        <option value="3">Oppo</option>
      </select>
    </div>
    <div class="input-group mb-3">
      <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Image</button>
      <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"
        aria-label="Upload">
    </div>
    <div class="form-floating mb-3">
      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2Disabled"
        style="height: 100px"></textarea>
      <label for="floatingTextarea2Disabled">Miêu tả</label>
    </div>
    <button type="submit" style='width:100%' class="btn btn-primary">Thêm</button>
  </form>
</div>