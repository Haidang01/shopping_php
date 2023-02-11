<?php
try {
    include '../model/connectDb.php';
    $id = $_GET['id'];
    $q = "DELETE FROM binh_luan WHERE `binh_luan`.`id` = $id";
    $statement = $connect->prepare($q);
    $result = $statement->execute();
    if ($result) {
        $thongbao = 'Bình luận đã được Xóa thành công';
        header("location: ../views/admin/quanlibl.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
}

$connect = null;
