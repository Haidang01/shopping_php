<?php
try {
    include '../model/connectDb.php';
    $id = $_POST['id'];
    $name = $_POST['ten_sp'];
    $gia = $_POST['gia_sp'];
    $mo_ta = $_POST['mo_ta'];
    $id_dm = $_POST['danhmuc'];
    $hinhanhpath = $_FILES['hinh']['name'];

    if ($gia <= 0) {
        $thongbao = 'Giá sản phẩm phải > 0!';
        header("location: ../views/admin/editsp.php?id=$id&&mess=$thongbao");
    } else if ($_FILES['hinh']['name'] == null) { //nếu không tải ảnh nên thì lấy lênhj sql trên
        $q = "UPDATE `san_pham` SET `name` = '$name', `price` = '$gia', `mo_ta` = '$mo_ta', `id_dm` = '$id_dm' WHERE `san_pham`.`id` = $id;";
    } else { //nếu có tải ảnh nên thì lấy lệnh sql dưới và chuyển file ảnh từ web vào dự án
        move_uploaded_file($_FILES['hinh']['tmp_name'], 'imgs/' . $_FILES['hinh']['name']);
        $q = "UPDATE `san_pham` SET `name` = '$name', `price` = '$gia', `mo_ta` = '$mo_ta', `id_dm` = '$id_dm',`anh` = 'imgs/$hinhanhpath'  WHERE `san_pham`.`id` = $id;";
    }
    $statement = $connect->prepare($q);
    $result = $statement->execute();

    $thongbao = 'Sản phẩm đã được cập nhật thành công';
    header("location: ../views/admin/quanlisp.php?mess=$thongbao");
} catch (PDOException $e) {
    echo "Lỗi query";
}

$connect = null;
