<?php
try {
    include '../model/connectDb.php';
    $name = $_POST['name'];
    $id = $_POST['id'];
    $q = "UPDATE `danh_muc` SET `name` = '$name' WHERE `danh_muc`.`id` = $id;";
    $statement = $connect->prepare($q);
    $result = $statement->execute();
    if ($result) {
        $thongbao = 'Danh mục đã được cập nhật';
        header("location: ../views/admin/quanlidm.php?mess=$thongbao");
    } else {
        $thongbao = 'Lỗi web';
        header("location: ../views/admin/quanlidm.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
}

$connect = null;