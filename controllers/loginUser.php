<?php
include '../model/connectDb.php';

try {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    if (empty($email) || empty($password)) {
        $thongbao = 'Vui lòng nhập đủ thông tin!';
        header("location: ../views/user/login.php?mess=$thongbao");
    } else {
        // query
        $q1 = "SELECT * FROM nguoi_dung WHERE email='$email'";
        $statement1 = $connect->prepare($q1);
        $statement1->execute();
        $user = $statement1->fetch();
        if (!$user) {
            $thongbao = 'Người dùng không tồn tại!';
            header("location: ../views/user/login.php?mess=$thongbao");
        } else {
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['userId'] = $user['id'];
                $_SESSION['username'] = $user['name'];
                if ($user['role'] == 1) {
                    header(
                        "location: ../views/admin/quanliuser.php?mess=$thongbao"
                    );
                } else {
                    header("location: ../views/user/home.php?mess=$thongbao");
                }
            } else {
                $thongbao = 'Tài khoản hoặc mật khẩu không chính xác!';
                header("location: ../views/user/login.php?mess=$thongbao");
            }
        }
    }
} catch (PDOException $e) {
    echo 'ajja';
    // echo $sq1 . '<br>' . $e->getMessage();
}
?>