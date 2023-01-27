<?php
try {
    include '../model/connectDb.php';
    $id = $_GET["id"];
    $q = "DELETE FROM san_pham WHERE `san_pham`.`id` = $id";
    $statement = $connect->prepare($q);
    $result = $statement->execute();
    if ($result) {
        $thongbao = 'Sản phẩm đã được Xóa thành công';
        header("location: ../views/admin/quanlisp.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
}

$connect = null;
