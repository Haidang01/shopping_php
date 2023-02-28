<?php include './components/header.php'; ?>
<?php
include '../../model/connectDb.php';
$q1 = 'SELECT * FROM danh_muc';
$statement1 = $connect->prepare($q1);
$statement1->execute();
$category = $statement1->fetchAll(); //tất cả danh mục
$q2 =
  'SELECT * FROM san_pham WHERE luot_xem >0 ORDER BY luot_xem  DESC LIMIT 0, 10;';
$statement2 = $connect->prepare($q2);
$statement2->execute();
$proTop10 = $statement2->fetchAll(); //top 10 sản phẩm //$id = $_GET['id'];
// Show products by params
$params = isset($_GET['pm']) ? $_GET['pm'] : 'all';
if ($params == 'all' && !isset($_POST['name'])) {
  $q3 = 'SELECT * FROM san_pham ORDER BY san_pham.id DESC LIMIT 0, 9;';
  $statement3 = $connect->prepare($q3);
  $statement3->execute();
  $products = $statement3->fetchAll();
} elseif (isset($_POST['name'])) {
  $name = $_POST['name'];
  $sql = "SELECT * FROM san_pham WHERE name LIKE '%$name%'";
  $statement3 = $connect->prepare($sql);
  $statement3->execute();
  $products = $statement3->fetchAll();
} else {
  $q3 = "SELECT * FROM san_pham WHERE id_dm = '$params'";
  $statement3 = $connect->prepare($q3);
  $statement3->execute();
  $products = $statement3->fetchAll();
}
?>
<div style="margin-left: 10px;">
  <div class="row mb">
    <div class="boxleft mr ">
      <div class="row">
        <div class="banner">
          <img src="https://thietkehaithanh.com/wp-content/uploads/2019/06/huong-dan-thiet-ke-banner-dien-thoai-bang-photoshop.jpg" alt="">
        </div>
        <div class="row">
          <h2 class="h2title">SẢN PHẨM </h2>
          <?php if (count($products) == 0) {
            echo '<h2 class="mt-5">Không có sản phẩm phù hợp</h2>';
          } else {
          ?>
            <?php foreach ($products as $top) { ?>
              <div class="boxspp mrs">
                <div class=" row img">
                  <a href="./chitiet.php?id=<?= $top['id'] ?>"><img src='../../controllers/<?php echo $top['anh']; ?>' style="height:200px; object-fit:cover;" alt=""></a>
                </div>
                <p class="price"><?php echo $top['price']; ?></p>
                <span class="prices"><?php echo $top['name']; ?></span>
              </div>
          <?php }
          } ?>
        </div>
      </div>
    </div>
    <div class="boxphai">
      <div class="row mb">
        <div class="boxtitle">TÀI KHOẢN</div>
        <div class="boxcontent formtaikhoan">
          <?php if (isset($_SESSION['userId'])) { ?>
            <div class="row mb10">
              <img src="/shopping_php/controllers/<?= $_SESSION['img'] ?>" alt="avata" style="width: 45px !important; height: 45px; border-radius: 50%;" class='rounded-circle'>
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
              echo '<a style="text-decoration: none;color:black" href="' .
                $linkdm .
                '"><li>' .
                $name .
                '</li></a>';
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
                    <a href="' .
              $linksp .
              '"><img src="/shopping_php/controllers/' .
              $sp['anh'] .
              ' "></a>
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