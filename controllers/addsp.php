<?php
try {
    include '../model/connectDb.php';
    $hinhanhpath = $_FILES['file']['name'];
    $name = $_POST['ten_sp'];
    $gia = $_POST['gia_sp'];
    $mo_ta = $_POST['mo_ta'];
    $id_dm = $_POST['danhmuc'];
    //Lưu ý rằng hàm empty chỉ kiểm tra xem một biến có rỗng hay không, không phải xem biến đó có tồn tại hay không. 
    //Nếu bạn muốn kiểm tra xem một biến có tồn tại hay không, bạn nên sử dụng hàm isset().

    if (empty($name) || empty($gia) || empty($mo_ta) || empty($hinhanhpath) || empty($id_dm)) {
        //empty = true => biến không có giá trị  
        //empty kiểm tra xem biến có giá trị hay rỗng, nếu rỗng thì quay lại trang thêm sp
        $thongbao = 'Vui lòng nhập đủ thông tin Sản phẩm!';
        header("location: ../views/admin/formAddsp.php?mess=$thongbao");
    } elseif ($gia <= 0) {
        $thongbao = 'Giá sản phẩm phải > 0!';
        header("location: ../views/admin/formAddsp.php?mess=$thongbao");
    } else {
        $q1 = "SELECT * FROM san_pham WHERE name ='$name'";
        $statement1 = $connect->prepare($q1);
        $statement1->execute();
        $san_pham_trung = $statement1->fetch();
        //kiểm tra xem sản phầm đã tồn tại chưa 
        if ($san_pham_trung) {
            $thongbao = 'Sản phẩm đã tồn tại!';
            header("location: ../views/admin/formAddsp.php?mess=$thongbao");
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], 'imgs/' . $hinhanhpath);
            $q = "INSERT INTO `san_pham` ( `name`, `anh`, `price`, `mo_ta`, `id_dm`) VALUES ('$name','imgs/$hinhanhpath', '$gia', '$mo_ta', '$id_dm')";
            $statement = $connect->prepare($q);
            $result = $statement->execute();
            $thongbao = 'Sản phẩm đã được tạo thành công';
            header("location: ../views/admin/quanlisp.php?mess=$thongbao"); //thêm thành công thì chuyển trang + thông báo thành công
        }
    }
} catch (PDOException $e) {
    echo 'loi query';
}

$connect = null;
