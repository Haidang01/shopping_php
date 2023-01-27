<?php
include 'header.php';
include '../../model/connectDb.php';
$q1 = "SELECT * FROM danh_muc";
$statement1 = $connect->prepare($q1);
$statement1->execute();
$category = $statement1->fetchAll();
?>

<div style="width: 50%; margin: 0 auto;" class='container p-5'>
  <h1 class="text-center mb-4">Thêm mới sản phẩm</h1>
  <form action='../../controllers/addsp.php' method='post'>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
      <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ten_sp">
    </div>
    <!-- <div class="mb-3">
      <label for="formFile" class="form-label">Hình</label>
      <input class="form-control" type="file" id="formFile" name="hinh">
    </div> -->
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Giá sản phẩm</label>
      <input type="number" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="gia_sp">
    </div>
    <div class=" input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
      <select class="form-select" id="inputGroupSelect01" name="danhmuc">
        <?php foreach ($category as $cate) { ?>
          <option value="<?= $cate["id"] ?>"><?= $cate["name"] ?></option>
        <?php } ?>
      </select>
    </div>
    <!-- <div class="input-group mb-3">
      <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Image</button>
      <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
    </div> -->
    <div class="form-floating mb-3">
      <textarea class="form-control" required name='mo_ta' placeholder="Leave a comment here" id="floatingTextarea2Disabled" style="height: 100px" name="mo_ta"></textarea>
      <label for="floatingTextarea2Disabled">Miêu tả</label>
    </div>
    <button type="submit" style='width:100%' class="btn btn-primary">Thêm</button>
  </form>
  <h3 style="color: red;"><?php echo isset($_GET["mess"]) ? $_GET['mess'] : "" ?></h3>

</div>