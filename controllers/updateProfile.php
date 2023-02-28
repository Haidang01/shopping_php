<?php
include '../model/connectDb.php';

try {
    session_start();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $hinhanhpath = $_FILES['file']['name'];
    if ($hinhanhpath) {
        move_uploaded_file($_FILES['file']['tmp_name'], 'imgs/' . $hinhanhpath);
        $q = "UPDATE `nguoi_dung` SET `name` = '$name', `anh` = 'imgs/$hinhanhpath', `dia_chi` = '$address' WHERE `nguoi_dung`.`id` = $id;";
        $statement = $connect->prepare($q);
        $result = $statement->execute();
        $_SESSION['img'] = 'imgs/' . $hinhanhpath;
    } else {
        $q1 = "UPDATE `nguoi_dung` SET `name` = '$name',  `dia_chi` = '$address' WHERE `nguoi_dung`.`id` = $id;";
        $statement1 = $connect->prepare($q1);
        $result = $statement1->execute(); //nếu k tải ảnh lên thì k cập nhật ảnh
    }

    if ($result) {
        $_SESSION['username'] = $name;
        $thongbao = 'Cập nhật thành công';
        header("location: ../views/user/changeInfo.php?mess=$thongbao");
    } else {
        $thongbao = 'Lỗi web';
        header("location: ../views/user/changeInfo.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    echo 'ajja';
    // echo $sq1 . '<br>' . $e->getMessage();
}
