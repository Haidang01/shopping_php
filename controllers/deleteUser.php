<?php
try {
    include '../model/connectDb.php';
    $id = $_GET['id'];

    $q2 = "DELETE FROM gio_hang WHERE `gio_hang`.`id_user` = $id";
    $statement = $connect->prepare($q2);
    $result1 = $statement->execute();

    $q3 = "DELETE FROM binh_luan WHERE `binh_luan`.`id_user` = $id";
    $statement = $connect->prepare($q3);
    $result3 = $statement->execute();

    $q = "DELETE FROM nguoi_dung WHERE `nguoi_dung`.`id` = $id";
    $statement = $connect->prepare($q);
    $result = $statement->execute();
    if ($result) {
        $thongbao = 'Người dùng đã được Xóa thành công';
        header("location: ../views/admin/quanliuser.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
}

$connect = null;
