<?php
session_start();
include '../model/connectDb.php';
if (!isset($_SESSION['userId'])) {
    header('location: /shopping_php/views/user/login.php');
};

$so_luong = $_POST['so_luong'];
$id_sp = $_POST['id_sp'];
$id_user = $_POST['id_user'];

// check user đã có sản phẩm đó chưa
$q = "SELECT * FROM gio_hang WHERE id_user='$id_user' AND id_sp='$id_sp'";
$statement = $connect->prepare($q);
$statement->execute();
$products = $statement->fetch();
if ($products) {
    $ghId = $products['id'];
    $quantity = $products['so_luong'] + $so_luong;
    // update products quantity
    $q1 = "UPDATE `gio_hang` SET `so_luong` = '$quantity' WHERE `gio_hang`.`id` = '$ghId'";
    $statement1 = $connect->prepare($q1);
    $statement1->execute();
} else {
    // insert products
    $q1 = "INSERT INTO `gio_hang` (`so_luong`, `id_sp`, `id_user`) VALUES ('$so_luong', '$id_sp', '$id_user');";
    $statement1 = $connect->prepare($q1);
    $statement1->execute();
}
header('location: /shopping_php/views/user/cart.php');
