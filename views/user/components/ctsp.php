<?php
include '../../model/connectDb.php';
//$_SESSION là 1 biến
$q1 = 'SELECT * FROM danh_muc';
$statement1 = $connect->prepare($q1);
$statement1->execute();
$category = $statement1->fetchAll(); //tất cả danh mục

$q2 = 'SELECT * FROM san_pham WHERE luot_xem > 0 ORDER BY luot_xem DESC LIMIT 0, 10;';
//ORDER BY DESC sắp xếp từ cao đến thấp rồi in ra 10 sp
$statement2 = $connect->prepare($q2);
$statement2->execute();
$proTop10 = $statement2->fetchAll(); //top 10 sản phẩm dựa theo 10 sản phẩm có lượt xem cao nhất

$id = $_GET['id'];
$q3 = "SELECT san_pham.id, san_pham.name, san_pham.anh, san_pham.price, san_pham.mo_ta, san_pham.luot_xem, san_pham.id_dm, danh_muc.name as 'cate_name' FROM `san_pham` LEFT JOIN `danh_muc` ON san_pham.id_dm = danh_muc.id where san_pham.id = $id";
$statement3 = $connect->prepare($q3);
$statement3->execute();
$productOne = $statement3->fetch(); //lấy id từ url xuống và fetch tất cả thông tin của sản phẩm có id =  $_GET['id'] -  chi tiết sản phẩm đang xem

$id_dm = $productOne['id_dm'];
$q4 = "SELECT * FROM san_pham where id_dm = $id_dm";
$statement4 = $connect->prepare($q4);
$statement4->execute();
$sp_dm = $statement4->fetchAll(); //sản phẩm cùng loại là in ra tất cả sản phẩm cùng danh mục sản phẩm dang xem chi tiết

// danh sách bình luận
$q5 = "SELECT * FROM binh_luan where id_sp = $id";
$statement5 = $connect->prepare($q5);
$statement5->execute();
$dsbl = $statement5->fetchAll();

// lượt xem tăng 1 khi kích xem chi tiết sp 
$updateLX = $productOne['luot_xem'] + 1;
$sql = "UPDATE `san_pham` SET `luot_xem` = '$updateLX' WHERE `san_pham`.`id` = '$id';";
$statement6 = $connect->prepare($sql);
$statement6->execute();
?>

<div style="margin-left: 10px;">
  <div class="row mb">
    <div class="boxtrai mr">
      <div class="mb row">
        <div class="boxtitle">
          <h2><?= $productOne['name'] ?></h2>
        </div>
        <div class="boxcontent">
          <div style="text-align: center;"><img style='width:200px; height:200px;' src="/shopping_php/controllers/<?= $productOne['anh'] ?>" alt="" id="img_sp"> </div>
          <h4 style="color:red;"><?= $productOne['price'] ?> VNĐ</h4>
          <h5>Lượt xem: <?= $productOne['luot_xem'] ?></h5>
          <p id="mo_ta"><?= $productOne['mo_ta'] ?></p>

          <div class="gio-hang" style="width:250px; ">
            <form action='/shopping_php/controllers/addToCart.php' method="post">
              <input type="text" name="id_sp" value="<?= $id ?>" hidden>
              <input type="text" name="id_user" value='<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : ''; ?>' hidden>
              <div class="mb-3 d-flex">
                <input type="number" name="so_luong" id="" placeholder="Số lượng" min="1" value="1" class="form-control" id="exampleInputPassword1">
                <button type="submit" style='width:100%' class="btn btn-primary">Thêm giỏ hàng</button>
              </div>

            </form>
          </div>
        </div>
      </div>

      <div class="row mb" id="binhluan">
        <div class="boxtitle">BÌNH LUẬN</div>
        <div class="boxcontent binhluan">
          <?php foreach ($dsbl as $bl) {
            $id_user = $bl['id_user'];
            $q6 = "SELECT `name`,`anh` FROM `nguoi_dung` where id = $id_user"; // LẤY TÊN VÀ ẢNH CỦA NGƯỜI DÙNG THÔNG QUA ID BÌNH LUẬN
            $statement6 = $connect->prepare($q6);
            $statement6->execute();
            $user = $statement6->fetch();
            //load tên người b luận thông qua id_user của từng bình luận - từng vòng lặp for
          ?>


            <div class="list_bl flex">
              <div class="user_bl">
                <img src="/shopping_php/controllers/<?= $user['anh'] ?>" alt="ảnh" style="width: 45px; height: 45px" class="rounded-circle">
              </div>
              <div class="noi_dung">
                <p class="name_user"><?= $user['name'] ?><span class="date"> - <?= $bl['ngay'] ?></span></p>
                <li class="nd_ct"><?= $bl['noi_dung'] ?></li>
              </div>
            </div>
          <?php
          } ?>




          <div class="" style="margin-top: 60px; width: 530px;">
            <!-- form bình luận -->
            <form action='/shopping_php/controllers/addBl.php' method="post">
              <input type="text" name="id_sp" value="<?= $id //lấy id sản phẩm đang xem chi tiết
                                                      ?>" hidden>
              <input type="text" name="id_user" value='<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : ''; //lấy id của người dùng đang đăng nhập
                                                        ?>' hidden>
              <div class="mb-3 d-flex">
                <input type="text" name="nd_bl" id="" placeholder="nhập bình luận tại đây" class="form-control" id="exampleInputPassword1">
                <button type="submit" style='width:20%' class="btn btn-primary">Gửi</button>
              </div>
              <h3 style="color:red; "><?php echo isset($_GET['mess']) ? $_GET['mess'] : ''; ?></h3>
            </form>
          </div>
        </div>


      </div>

      <div class="row mb ">
        <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
        <div class="boxcontent ">
          <?php foreach ($sp_dm as $spdm) { ?>
            <div class='d-flex my-4 mx-3 gap-2'>
              <a href="chitiet.php?id=<?= $spdm['id'] ?>">
                <img src='/shopping_php/controllers/<?php echo $spdm['anh']; ?>' style="width: 45px; height: 45px ; object-fit:cover">
                <div id="ten_sp"><?= $spdm['name'] ?>
              </a>
            </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
  <div class="boxphai">

    <div class="row mb">
      <div class="boxtitle">TÀI KHOẢN</div>
      <div class="boxcontent formtaikhoan">
        <?php if (isset($_SESSION['userId'])) { ?>
          <div class="row mb10">
            <img src="/shopping_php/controllers/<?= $_SESSION['img'] ?>" alt="avata" style="width: 45px; height: 45px; border-radius: 50%;">
            <h5>Xin chào, <?= $_SESSION['username'] ?></h5>
          </div>
          <div class="row mb10">
            <li>
              <a href="/shopping_php/views/user/changePassword.php">Quên mật khẩu</a>
            </li>
            <li>
              <a href="/shopping_php/views/user/changeInfo.php">Cập nhật tài khoản</a>
            </li>
            <?php if ($_SESSION['role'] == 1) { ?>
              <li>
                <a href="/shopping_php/views/admin/quanliuser.php">Đăng nhập Admin</a>
              </li>
            <?php } ?>
            <li>
              <a href="/shopping_php/controllers/logout.php">Đăng xuất</a>
            </li>
          </div>
        <?php
        } else {
        ?>
          <form action="/shopping_php/controllers/loginUser.php" method="post" style="width: 110%;">
            <div class="row mb10">
              Email đăng nhập <br>
              <input type="email" name="email">
            </div>
            <div class="row mb10">
              Mật khẩu <br>
              <input type="password" name="pass">
            </div>
            <div class="row mb10" style="display: flex;">
              <div><input type="checkbox" name=""></div>
              <div>Ghi nhớ tài khoản?</div>
            </div>
            <div class="row mb10">
              <input type="submit" value="Đăng nhập" name="dangnhap">
            </div>
          </form>
          <div>
            <li>
              <a href="#">Quên mật khẩu</a>
            </li>
            <li>
              <a href="index.php?act=dangky">Đăng ký thành viên</a>
            </li>
          </div>
        <?php
        } ?>
      </div>
    </div>
    <div class="row mb">
      <div class="boxtitle">DANH MỤC</div>
      <div class="boxcontent2 menudoc">
        <ul>
          <?php foreach ($category as $dm) {
            extract($dm);
            $linkdm = '/shopping_php/views/user/home.php?pm=' . $id;
            echo '<a style="text-decoration: none;color:black" href="' . $linkdm . '"><li>' . $name . '</li></a>';
          } ?>
        </ul>
      </div>
      <div class="boxfooter searbox">
        <form class="d-flex mx-5" action="/shopping_php/views/user/home.php" method='post' role="search">
          <input class="form-control me-2" type="search" name='name' placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="boxtitle">TOP 10 YÊU THÍCH</div>
      <div class="boxcontent">
        <?php foreach ($proTop10 as $sp) {
          $linksp = './chitiet.php?id=' . $sp['id'];
          echo '<div class="mb10 top10">
                  <a href="' . $linksp . '"><img src="/shopping_php/controllers/' . $sp['anh'] . ' "></a>
                  <a href="' . $linksp . '">' . $sp['name'] . '</a>
                </div>';
        } ?>
      </div>
    </div>
  </div>
</div>
</div>
<style>
  .flex {
    margin-top: 20px;
    display: flex;
  }

  .justify-between {
    justify-content: flex-start;
    align-items: center;
  }

  .noi_dung {
    margin-left: 15px;
  }



  .nd_ct {
    list-style: circle;
  }

  .name_user {
    font-weight: 600;
    margin-bottom: 5px;
  }

  .date {
    color: gray;
    font-size: 10px;
  }
</style>