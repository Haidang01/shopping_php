
<?php
include '../model/connectDb.php';
$nd_bl = $_POST['nd_bl'];
$id_sp = $_POST['id_sp'];
$id_user = $_POST['id_user'];
$ngay_bl = date("Y/m/d");

if ($nd_bl == null) {
    $thongbao = "vui long khong de trong binh luan";
    header("location: /shopping_php/views/user/chitiet.php?id=$id_sp&mess=$thongbao");
} else if ($id_user == null) {
    $thongbao = "vui long dang nhap de su dung chuc nang binh luan";
    header("location: /shopping_php/views/user/chitiet.php?id=$id_sp&mess=$thongbao");
} else {
    $q = "INSERT INTO `binh_luan` (`noi_dung`, `id_sp`, `id_user`,`ngay`) VALUES ('$nd_bl', '$id_sp', '$id_user', '$ngay_bl');";
    $statement = $connect->prepare($q);
    $result = $statement->execute();
    header("location: /shopping_php/views/user/chitiet.php?id=$id_sp");
}

<?php ?>

?>
