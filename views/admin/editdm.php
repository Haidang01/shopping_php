<?php
include 'header.php';
include '../../model/connectDb.php';
$id = $_GET['id'];
$q1 = "SELECT * FROM danh_muc where id = '$id'";
$statement1 = $connect->prepare($q1);
$statement1->execute();
$categoryOne = $statement1->fetch();
?>

<div style="width: 50%; margin: 0 auto;" class='container p-5'>
    <h1 class="text-center mb-4">Cập nhật danh mục</h1>
    <h3 style="color: red;"><?php echo isset($_GET['mess']) ? $_GET['mess'] : ''; ?></h3>

    <form action='../../controllers/updatedm.php' method='post'>
        <input type="text" name="id" value="<?= $categoryOne['id'] ?>" hidden>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
            <input type="text" name='name' required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $categoryOne['name'] ?>">
        </div>
        <button type="submit" style='width:100%' class="btn btn-primary">Cập nhật</button>
    </form>
</div>