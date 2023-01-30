<?php
try {
    include '../model/connectDb.php';
    $id = $_GET['id'];
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