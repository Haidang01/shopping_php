<?php
include '../model/connectDb.php';

try {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['pass'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $hinhanhpath = $_FILES['file']['name'];
    if (
        empty($email) ||
        empty($name) ||
        empty($phone) ||
        empty($address) ||
        empty($password) ||
        empty($hinhanhpath)
    ) {
        $thongbao = 'Nhập dữ liệu vào trường!';
        header("location: ../views/user/signup.php?mess=$thongbao");
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
            header("location: ../views/user/signup.php?mess=$thongbao");
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], 'imgs/' . $hinhanhpath);
            $q = "INSERT INTO `nguoi_dung` (`name`,`anh`,`email`,`dia_chi`, `sdt`, `password`) VALUES ('$name','imgs/$hinhanhpath', '$email', '$address', '$phone', '$hashed_password');";
            $statement = $connect->prepare($q);
            $result = $statement->execute();
            if ($result) {
                $thongbao = 'Đăng kí thành công';
                header("location: ../views/user/login.php?mess=$thongbao");
            } else {
                $thongbao = 'Lỗi web';
                header("location: ../views/user/signup.php?mess=$thongbao");
            }
        }
    }
} catch (PDOException $e) {
    echo 'ajja';
    // echo $sq1 . '<br>' . $e->getMessage();
}
