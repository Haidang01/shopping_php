<?php
include '../model/connectDb.php';

try {
    session_start();
    $id = $_SESSION['userId'];
    $mkcu = $_POST['mkcu'];
    $mkmoi = $_POST['mkmoi'];
    $mkmoi1 = $_POST['mkmoi1'];
    if ($mkmoi != $mkmoi1) {
        header("location: ../views/user/ChangePassword.php?mess=$thongbao");
    }
    $q = "SELECT * FROM nguoi_dung WHERE id='$id'";
    $statement = $connect->prepare($q);
    $statement->execute();
    $user = $statement->fetch();
    if (password_verify($mkcu, $user['password'])) {
        $hashed_password = password_hash($mkmoi, PASSWORD_DEFAULT);
        $q1 = "UPDATE `nguoi_dung` SET `password` = '$hashed_password' WHERE `nguoi_dung`.`id` = $id;";
        $statement1 = $connect->prepare($q1);
        $result = $statement1->execute();
        if ($result) {
            session_destroy();
            $thongbao = 'Cập nhật thành công';
            header("location: ../views/user/login.php?mess=$thongbao");
        } else {
            $thongbao = 'Lỗi web';
            header("location: ../views/user/ChangePassword.php?mess=$thongbao");
        }
    } else {
        $thongbao = 'Mật khẩu cũ không chính xác!';
        header("location: ../views/user/ChangePassword.php?mess=$thongbao");
    }
} catch (PDOException $e) {
    echo 'ajja';
    // echo $sq1 . '<br>' . $e->getMessage();
}
