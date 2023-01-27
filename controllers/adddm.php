<?php
try {
    include '../model/connectDb.php';
    $name = $_POST['name'];
    if (empty($name)) {
        echo 'Nhập tên danh mục!';
    } else {
        $q1 = 'SELECT * FROM danh_muc';
        $statement1 = $connect->prepare($q1);
        $statement1->execute();
        $category = $statement1->fetch();
        echo $category;
        die();
        if ($category) {
            echo 'Danh mục đã tồn tại!';
        } else {
            $q = "INSERT INTO danh_muc (name) VALUES ('$name')";
            $statement = $connect->prepare($q);
            $result = $statement->execute();
            if ($result) {
                header('Location:list_category.php');
                echo 'New record created successfully';
            } else {
                echo 'Something went wrong';
            }
        }
    }
} catch (PDOException $e) {
    echo $sql . '<br>' . $e->getMessage();
}

$conn = null;
?>