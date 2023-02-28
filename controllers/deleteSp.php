<?php
try {
    include '../model/connectDb.php'; //xóa khóa ngoại trước, xóa khóa chính sau
    //khi xóa sp thì phải xóa khóa ngoại trước là 2 bảng giỏ hàng và bình luận

    $id = $_GET['id'];
    $q2 = "DELETE FROM gio_hang WHERE `gio_hang`.`id_sp` = $id";
    $statement = $connect->prepare($q2);
    $result1 = $statement->execute();

    $q3 = "DELETE FROM binh_luan WHERE `binh_luan`.`id_sp` = $id";
    $statement = $connect->prepare($q3);
    $result2 = $statement->execute();

    $q = "DELETE FROM san_pham WHERE `san_pham`.`id` = $id";
    $statement = $connect->prepare($q);
    $result = $statement->execute();

    if ($result) { //khi xóa được sp rồi thì quay lại trang quản lí sp và thông báo xóa thành công
        $thongbao = 'Sản phẩm đã được Xóa thành công';
        header("location: ../views/admin/quanlisp.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
}

$connect = null;
