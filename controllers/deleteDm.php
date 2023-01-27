<?php
try {
    include '../model/connectDb.php';
    $id = $_GET["id"];
    $q = "DELETE FROM danh_muc WHERE `danh_muc`.`id` = $id";
    $statement = $connect->prepare($q);
    $result = $statement->execute();
    if ($result) {
        $thongbao = 'Danh mục đã được Xóa thành công';
        header("location: ../views/admin/quanlidm.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
}

$connect = null;
