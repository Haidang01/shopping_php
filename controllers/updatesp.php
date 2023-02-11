<?php
try {
    include '../model/connectDb.php';
    $id = $_POST['id'];
    $name = $_POST['ten_sp'];
    $gia = $_POST['gia_sp'];
    $mo_ta = $_POST['mo_ta'];
    $id_dm = $_POST['danhmuc'];
    $img_url = 'imgs/' . $_FILES['hinh']['name'];

    if ($_FILES['hinh']['name'] == null) {
        $q = "UPDATE `san_pham` SET `name` = '$name', `price` = '$gia', `mo_ta` = '$mo_ta', `id_dm` = '$id_dm' WHERE `san_pham`.`id` = $id;";
    } else {
        move_uploaded_file($_FILES['hinh']['tmp_name'], 'imgs/' . $_FILES['hinh']['name']);

        $q = "UPDATE `san_pham` SET `name` = '$name', `price` = '$gia', `mo_ta` = '$mo_ta', `id_dm` = '$id_dm',`anh` = '$img_url'  WHERE `san_pham`.`id` = $id;";
    }
    $statement = $connect->prepare($q);
    $result = $statement->execute();
    if ($result) {
        $thongbao = 'Sản phẩm đã được cập nhật thành công';
        header("location: ../views/admin/quanlisp.php?mess=$thongbao");
    } else {
        $thongbao = 'Lỗi web';
        header("location: ../views/admin/quanlisp.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
}

$connect = null;
