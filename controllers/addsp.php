<?php
try {
    include '../model/connectDb.php';
    $file = $_FILES['file'];
    // File properties
    $hinhanhpath = basename($_FILES['file']['name']);
    $name = $_POST['ten_sp'];
    $gia = $_POST['gia_sp'];
    $mo_ta = $_POST['mo_ta'];
    $id_dm = $_POST['danhmuc'];
    if (
        empty($name) ||
        empty($gia) ||
        empty($mo_ta) ||
        !isset($_FILES['file'])
    ) {
        $thongbao = 'Vui lòng nhập đủ thông tin Sản phẩm!';
        header("location: ../views/admin/formAddsp.php?mess=$thongbao");
    } else {
        $q1 = "SELECT * FROM san_pham WHERE name ='$name'";
        $statement1 = $connect->prepare($q1);
        $statement1->execute();
        $category = $statement1->fetch();
        if ($category) {
            $thongbao = 'Sản phẩm đã tồn tại!';
            header("location: ../views/admin/formAddsp.php?mess=$thongbao");
        } else {
            $target_file = 'imgs/' . $hinhanhpath;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                $q = "INSERT INTO `san_pham` ( `name`, `anh`, `price`, `mo_ta`, `id_dm`) VALUES ('$name','$target_file', '$gia', '$mo_ta', '$id_dm')";
                $statement = $connect->prepare($q);
                $result = $statement->execute();
                if ($result) {
                    $thongbao = 'Sản phẩm đã được tạo thành công';
                    header(
                        "location: ../views/admin/quanlisp.php?mess=$thongbao"
                    );
                } else {
                    $thongbao = 'Lỗi web';
                    header(
                        "location: ../views/admin/quanlisp.php?mess=$thongbao"
                    );
                }
            }
        }
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
    echo 'loi query';
}

$connect = null;