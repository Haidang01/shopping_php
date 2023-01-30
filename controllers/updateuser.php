<?php
try {
    include '../model/connectDb.php';
    $name = $_POST['name'];
    $address = $_POST['address'];
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $q = "UPDATE `nguoi_dung` SET `name` = '$name',`dia_chi`='$address',`sdt`='$phone' WHERE `nguoi_dung`.`id` = $id;";
    $statement = $connect->prepare($q);
    $result = $statement->execute();
    if ($result) {
        $thongbao = 'Danh mục đã được cập nhật';
        header("location: ../views/admin/quanliuser.php?mess=$thongbao");
    } else {
        $thongbao = 'Lỗi web';
        header("location: ../views/admin/quanliuser.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
}

$connect = null;