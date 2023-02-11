<?php
include '../../model/connectDb.php';
$q1 = 'SELECT * FROM danh_muc';
$statement1 = $connect->prepare($q1);
$statement1->execute();
$category = $statement1->fetchAll(); //tất cả danh mục

$q2 =
  'SELECT * FROM san_pham WHERE luot_xem > 0 ORDER BY luot_xem DESC LIMIT 0, 10;';
$statement2 = $connect->prepare($q2);
$statement2->execute();
$proTop10 = $statement2->fetchAll(); //top 10 sản phẩm

$id = $_GET['id'];
$q3 = "SELECT san_pham.id, san_pham.name, san_pham.anh, san_pham.price, san_pham.mo_ta, san_pham.luot_xem, san_pham.id_dm, danh_muc.name as 'cate_name' FROM `san_pham` LEFT JOIN `danh_muc` ON san_pham.id_dm = danh_muc.id where san_pham.id = $id";
$statement3 = $connect->prepare($q3);
$statement3->execute();
$productOne = $statement3->fetch(); //chi tiết sản phẩm đang xem

$q4 = 'SELECT * FROM san_pham where id_dm = ' . $productOne['id_dm'];
$statement4 = $connect->prepare($q4);
$statement4->execute();
$sp_dm = $statement4->fetchAll(); //tất cả sản phẩm cùng danh mục


// danh sách bình luận
$q5 = 'SELECT * FROM binh_luan where id_sp = ' . $id;
$statement5 = $connect->prepare($q5);
$statement5->execute();
$dsbl = $statement5->fetchAll();

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
        </div>
      </div>

      <div class="row mb" id="binhluan">
        <div class="boxtitle">BÌNH LUẬN</div>
        <div class="boxcontent binhluan">
          <?php foreach ($dsbl as $bl) {
            $q6 = 'SELECT `name`,`anh` FROM `nguoi_dung` where id = ' . $bl['id_user']; // LẤY TÊN VÀ ẢNH CỦA NGƯỜI DÙNG THÔNG QUA ID BÌNH LUẬN
            $statement6 = $connect->prepare($q6);
            $statement6->execute();
            $user = $statement6->fetch(); //load tên người b luận thông qua id_user của từng bình luận


          ?>


            <div class="list_bl flex">
              <div class="user_bl">
                <img src="https://i.pinimg.com/564x/d3/04/9c/d3049c10c2bd0efd3fc8d9b74d334961.jpg" alt="ảnh">
              </div>
              <div class="noi_dung">
                <p class="name_user"><?= $user['name'] ?><span class="date"> - <?= $bl['ngay'] ?></span></p>
                <li class="nd_ct"><?= $bl['noi_dung'] ?></li>
              </div>
            </div>
          <?php } ?>




          <div class="" style="margin-top: 60px;">
            <!-- form bình luận -->
            <form action='/shopping_php/controllers/addBl.php' method="post">
              <input type="text" name="id_sp" value="<?= $id ?>" hidden>
              <input type="text" name="id_user" value='<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : ""; ?>' hidden>
              <input type="text" name="nd_bl" id="" placeholder="Bình luận">
              <button type="submit">Gửi</button>
              <h3 style="color:red; "><?php echo isset($_GET['mess']) ? $_GET['mess'] : ""; ?></h3>
            </form>
          </div>
        </div>


      </div>

      <!-- <div class="row">
            <iframe src="" frameborder="0"></iframe>
        </div> -->
      <div class="row mb ">
        <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
        <div class="boxcontent ">
          <?php foreach ($sp_dm as $spdm) { ?>
            <div id="ten_sp"><a href="chitiet.php?id=<?= $spdm['id'] ?>"><?= $spdm['name'] ?></a></div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="boxphai">
      <?php
      //include "../boxright.php";
      ?>
      <div class="row mb">
        <div class="boxtitle">TÀI KHOẢN</div>
        <div class="boxcontent formtaikhoan">
          <?php if (isset($_SESSION['user'])) {
            extract($_SESSION['user']); ?>
            <div class="row mb10">
              <img src="upload/<?php
                                //echo $hinh
                                ?>" alt="avata" id="avata">
              <h3>Xin chào, <?php
                            //echo $ho_ten
                            ?></h3>
            </div>
            <div class="row mb10">
              <li>
                <a href="index.php?act=quenmk">Quên mật khẩu</a>
              </li>
              <li>
                <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
              </li>
              <?php if ($vai_tro == 1) { ?>
                <li>
                  <a href="admin/index.php?act=adddm">Đăng nhập Admin</a>
                </li>
              <?php } ?>
              <li>
                <a href="index.php?act=thoat">Thoát</a>
              </li>
            </div>
          <?php
          } else {
          ?>
            <form action="index.php?act=dangnhap" method="post" style="width: 110%;">
              <div class="row mb10">
                Tên đăng nhập <br>
                <input type="text" name="user">
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
                <a href="index.php?act=quenmk">Quên mật khẩu</a>
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
              $linkdm = '' . $id;
              echo '<li>
                                    <a href="' .
                $linkdm .
                '">' .
                $name .
                '</a>
                                </li>';
            } ?>
          </ul>
        </div>
        <div class="boxfooter searbox">
          <form action="" method="post">
            <input type="text" name="search">
            <input type="submit" name="timkiem" value="Tìm kiếm">
          </form>
        </div>
      </div>
      <div class="row">
        <div class="boxtitle">TOP 10 YÊU THÍCH</div>
        <div class="boxcontent">
          <?php foreach ($proTop10 as $sp) {
            $linksp = '' .  $sp['id'];
            echo '<div class="mb10 top10">
                    <a href="' .
              $linksp .
              '"><img src="/shopping_php/controllers/' . $sp['anh'] . ' "></a>
                    <a href="' .
              $linksp .
              '">' .
              $sp['name'] .
              '</a>
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


  .user_bl img {
    width: 50px;
    border-radius: 50%;
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