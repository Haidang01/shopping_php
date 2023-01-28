<?php
try {
    include '../model/connectDb.php';
    $name = $_POST['name'];
    if (empty($name)) {
        $thongbao = 'Nhập tên danh mục!';
        header("location: ../views/admin/formadddm.php?mess=$thongbao");
    } else {
        $q1 = "SELECT * FROM danh_muc WHERE name ='$name'";
        $statement1 = $connect->prepare($q1);
        $statement1->execute();
        $category = $statement1->fetch();
        if ($category) {
            $thongbao = 'Danh mục đã tồn tại!';
            header("location: ../views/admin/formadddm.php?mess=$thongbao");
        } else {
            $q = "INSERT INTO danh_muc (name) VALUES ('$name')";
            $statement = $connect->prepare($q);
            $result = $statement->execute();
            if ($result) {
                $thongbao = 'Danh mục đã được tạo thành công';
                header("location: ../views/admin/quanlidm.php?mess=$thongbao");
            } else {
                $thongbao = 'Lỗi web';
                header("location: ../views/admin/formadddm.php?mess=$thongbao");
            }
        }
    }
} catch (PDOException $e) {
    // echo $sq1 . '<br>' . $e->getMessage();
}

$connect = null;
