<?php
include 'header.php';
include '../../model/connectDb.php';

$id = $_GET['id'];
$q1 = "SELECT * FROM nguoi_dung WHERE id ='$id'";
$statement1 = $connect->prepare($q1);
$statement1->execute();
$user = $statement1->fetch();
?>
<div style="width: 50%; margin: 0 auto;" class='container p-5'>
  <h1 class="text-center">Cập nhật người dùng</h1>
  <h3 style="color: red;"><?php echo isset($_GET['mess']) ? $_GET['mess'] : ''; ?></h3>

  <form action="/shopping_php/controllers/updateUser.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email </label>
      <input type="email" disabled value="<?= $user['email'] ?>" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" value="<?= $user['name'] ?>" required name="name" id="exampleInputEmail1" aria-describedby="emailHelp" />
      <div class="mb-3">
        <label for="formFile" class="form-label">Avatar</label>
        <input class="form-control" type="file" id="formFile" name="avatar">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Address</label>
        <input type="text" value="<?= $user['dia_chi'] ?>" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" name="address">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="number" value="<?= $user['sdt'] ?>" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" name="phone">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Role</label>
        <input type="number" value="<?= $user['role'] ?>" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" name="role">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>