<?php
// try {
//     include '../model/connectDb.php';
//     $spId = $_POST['spId'];
//     $userId = $_POST['userId'];
//     $bl = $_POST['bl'];
//     echo $userId . ' ' . $spId . ' ' . $bl;
//     $q = "INSERT INTO `binh_luan` (`noi_dung`, `id_sp`, `id_user`) VALUES ('$bl', '$spId', '$userId')";
//     $statement = $connect->prepare($q);
//     $result = $statement->execute();
//     if ($result) {
//         header("location: ../views/user/chitiet.php");
//     } else {
//         $thongbao = 'Lỗi web';
//         header("location: ../views/admin/formadddm.php?mess=$thongbao");
//     }
// } catch (PDOException $e) {
//     echo 'jsahfsj';
//     // echo $sq1 . '<br>' . $e->getMessage();
// }

// $connect = null;
?>
<?php
include '../model/connectDb.php';
$nd_bl = $_POST['nd_bl'];
$id_sp = $_POST['id_sp'];
$id_user = $_POST['id_user'];
$ngay_bl = date("Y/m/d");

//validate: nếu nội dung bình luận hoặc người dùng chưa đắng nhập thì sẽ quay lại trang chi tết sản phẩm và in ra thông báo
if ($nd_bl == null) {
    $thongbao = "vui long khong de trong binh luan";
    header("location: /shopping_php/views/user/chitiet.php?id=$id_sp&mess=$thongbao");
} else if ($id_user == null) { //$id_user == null tức à không tìm thấy id người dùng => chưa đăng nhập
    $thongbao = "vui long dang nhap de su dung chuc nang binh luan";
    header("location: /shopping_php/views/user/chitiet.php?id=$id_sp&mess=$thongbao");
} else {
    $q = "INSERT INTO `binh_luan` (`noi_dung`, `id_sp`, `id_user`,`ngay`) VALUES ('$nd_bl', '$id_sp', '$id_user', '$ngay_bl');";
    $statement = $connect->prepare($q);
    $result = $statement->execute();
    header("location: /shopping_php/views/user/chitiet.php?id=$id_sp");
}



?>
