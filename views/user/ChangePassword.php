<?php
include './components/header.php';
include '../../model/connectDb.php';
$userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : "";
if ($userId) {
  $q1 = 'SELECT * FROM nguoi_dung WHERE id = ' . $userId;
  $statement1 = $connect->prepare($q1);
  $statement1->execute();
  $user = $statement1->fetch();
}

//
?>
<div style="width: 50%; margin: 0 auto;">
  <h1 class="text-center">Đổi mật khẩu</h1>
  <p style="color: red;"><?php echo isset($_GET['mess']) ? $_GET['mess'] : ''; ?></p>
  <form action="/shopping_php/controllers/changePassword.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Mật khẩu cũ</label>
      <input type="password" class="form-control" required name="mkcu">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Mật khẩu mới</label>
      <input type="password" class="form-control" required name="mkmoi">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Xác nhận mật khẩu</label>
      <input type="password" class="form-control" required name="mkmoi1">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>