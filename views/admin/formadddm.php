<?php
include 'header.php'; ?>
<div style="width: 50%; margin: 0 auto;" class='container p-5'>
  <h1 class="text-center mb-4">Thêm mới danh mục</h1>
  <h3 style="color: red;"><?php echo isset($_GET['mess']) ? $_GET['mess'] : ''; ?></h3>
  <form action='../../controllers/adddm.php' method='post'>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
      <input type="text" name='name' required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" style='width:100%' class="btn btn-primary">Thêm</button>
  </form>
</div>