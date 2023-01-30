<?php
include '../model/connectDb.php';

try {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['pass'];
    $phone = $_POST['phone'];
    $file = $_FILES['file'];
    // File properties
    $hinhanhpath = basename($_FILES['file']['name']);
    $address = $_POST['address'];
    if (
        empty($email) ||
        empty($name) ||
        empty($phone) ||
        empty($address) ||
        empty($password)
    ) {
        $thongbao = 'Nhập đủ danh mục!';
        header("location: ../views/user/formAddUser.php?mess=$thongbao");
    } else {
        // hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // query
        $q1 = "SELECT * FROM nguoi_dung WHERE email='$email'";
        $statement1 = $connect->prepare($q1);
        $statement1->execute();
        $user = $statement1->fetchAll();
        if ($user) {
            $thongbao = 'Người dùng đã tồn tại!';
            header("location: ../views/user/formAddUser.php?mess=$thongbao");
        } else {
            $target_file = 'imgs/' . $hinhanhpath;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                $q = "INSERT INTO `nguoi_dung` (`name`,`anh`, `email`,`dia_chi`,`sdt`,`password`) VALUES ('$name','$target_file', '$email', '$address', '$phone', '$hashed_password');";
                $statement = $connect->prepare($q);
                $result = $statement->execute();
                if ($result) {
                    $thongbao = 'Thêm thành công';
                    header(
                        "location: ../views/admin/quanliuser.php?mess=$thongbao"
                    );
                } else {
                    $thongbao = 'Lỗi web';
                    header("location: ../views/user/signup.php?mess=$thongbao");
                }
            }
        }
    }
} catch (PDOException $e) {
    echo 'ajja';
    // echo $sq1 . '<br>' . $e->getMessage();
}