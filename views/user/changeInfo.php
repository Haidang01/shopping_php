<?php
include './components/header.php';
include '../../model/connectDb.php';
$userId = $_SESSION['userId'];
$q1 = 'SELECT * FROM nguoi_dung WHERE id = ' . $userId;
$statement1 = $connect->prepare($q1);
$statement1->execute();
$user = $statement1->fetch();

//
?>
<div style="width: 50%; margin: 0 auto;">
  <h1 class="text-center">Cập nhập thông tin user</h1>
  <form action="/shopping_php/controllers/updateProfile.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email </label>
      <input type="email" value=<?= $user[
          'email'
      ] ?> class="form-control" required disabled id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" value=<?= $user[
          'name'
      ] ?> required name="name" id="exampleInputEmail1" aria-describedby="emailHelp" />
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Avatar</label>
      <input class="form-control" type="file" id="formFile" name="file">
    </div>
    <input type="text" value=<?= $user[
        'id'
    ] ?> hidden class="form-control" name="id">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Address</label>
      <input type="text" class="form-control" value=<?= $user[
          'dia_chi'
      ] ?> required id="exampleInputEmail1" aria-describedby="emailHelp" name="address">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>