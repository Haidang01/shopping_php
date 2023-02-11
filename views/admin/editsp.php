<?php
include 'header.php';
include '../../model/connectDb.php';
$id = $_GET['id'];
$q1 = "SELECT san_pham.id, san_pham.name, san_pham.price, san_pham.mo_ta, san_pham.luot_xem, san_pham.id_dm, danh_muc.name as 'cate_name' FROM `san_pham` LEFT JOIN `danh_muc` ON san_pham.id_dm = danh_muc.id where san_pham.id = $id";
$statement1 = $connect->prepare($q1);
$statement1->execute();
$productOne = $statement1->fetch();

$q2 = 'SELECT * FROM danh_muc';
$statement = $connect->prepare($q2);
$statement->execute();
$category = $statement->fetchAll();

// $q1 = "SELECT * FROM san_pham where id = $id";
// $statement1 = $connect->prepare($q1);
// $statement1->execute();
// $productOne = $statement1->fetch();

// $q1 = "SELECT * FROM danh_muc where id =" .  $productOne['id_dm'];
// $statement1 = $connect->prepare($q1);
// $statement1->execute();
// $cateOne = $statement1->fetch();
?>



<div style="width: 50%; margin: 0 auto;" class='container p-5'>
  <h1 class="text-center mb-4">Cập nhật sản phẩm</h1>
  <form action='../../controllers/updatesp.php' method='post' enctype="multipart/form-data">
    <input type="text" name="id" value="<?= $productOne['id'] ?>" hidden>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
      <input type="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ten_sp" value="<?= $productOne['name'] ?>">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Hình</label>
      <input class="form-control" type="file" id="formFile" name="hinh">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Giá sản phẩm</label>
      <input type="number" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="gia_sp" value="<?= $productOne['price'] ?>">
    </div>
    <div class=" input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
      <select class="form-select" id="inputGroupSelect01" name="danhmuc">
        <option value="<?= $productOne['id_dm'] ?>"><?= $productOne['cate_name'] ?></option>

        <?php foreach ($category as $cate) { ?>
          <option value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-floating mb-3">
      <textarea class="form-control" required name='mo_ta' placeholder="Leave a comment here" id="floatingTextarea2Disabled" style="height: 100px" name="mo_ta"><?= $productOne['mo_ta'] ?></textarea>
      <label for="floatingTextarea2Disabled">Miêu tả</label>
    </div>
    <button type="submit" style='width:100%' class="btn btn-primary">Cập nhật</button>
  </form>
  <h3 style="color: red;"><?php echo isset($_GET['mess'])
                            ? $_GET['mess']
                            : ''; ?></h3>

</div>