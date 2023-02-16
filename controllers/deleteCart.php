<?php
try {
    include '../model/connectDb.php';
    $id = $_GET['id'];

    $q2 = "DELETE FROM gio_hang WHERE `gio_hang`.`id` = $id";
    $statement = $connect->prepare($q2);
    $result = $statement->execute();
    if ($result) {
        $thongbao = 'Sản phẩm đã được Xóa thành công ra khỏi giỏ hàng';
        header("location:/shopping_php/views/user/cart.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
}

$connect = null;
