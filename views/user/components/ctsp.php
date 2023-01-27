<div style="margin-left: 10px;">
    <div class="row mb">
        <div class="boxtrai mr">
            <div class="mb row">
                <div class="boxtitle">
                    <h2>Tên sản phẩm</h2>
                </div>
                <div class="boxcontent">
                    <div style="text-align: center;"><img src="https://i.pinimg.com/564x/d3/04/9c/d3049c10c2bd0efd3fc8d9b74d334961.jpg" alt="" id="img_sp"> </div>
                    <p id="mo_ta">Cá mập là một nhóm cá thuộc lớp Cá sụn, thân hình thủy động học dễ dàng rẽ nước, có từ 5 đến 7 khe mang dọc mỗi bên hoặc gần đầu (khe đầu tiên sau mắt gọi là lỗ thở), da có nhiều gai nhỏ bao bọc cơ thể chống lại ký sinh, các hàng răng trong miệng có thể mọc lại được. Cá mập bao gồm các loài với kích cỡ chỉ bằng bàn tay, như Euprotomicrus bispinatus, một loài cá sống dưới đáy biển dài chỉ 22 xentimét, đến cá nhám voi khổng lồ (Rhincodon typus), loài cá lớn nhất với chiều dài 12 mét (39 ft) tương đương với một con cá voi nhưng chỉ ăn sinh vật vật phù du, mực ống và một số loài cá nhỏ khác. Cá mập bò (Carcharhinus leucas) còn được biết đến nhiều nhất nhờ khả năng bơi được trong cả nước ngọt và nước mặn,[1] thậm chí là ở các vùng châu thổ. Cá mập được cho là xuất hiện cách đây hơn 420 triệu năm, trước cả thời kỳ xuất hiện khủng long.[2]</p>
                </div>
            </div>

            <div class="row mb" id="binhluan">
                <div class="boxtitle">BÌNH LUẬN</div>
                <div class="boxcontent binhluan">
                    <table>
                        <tr>
                            <td>' . $noi_dung . '</td>
                            <td>' . họ tên người bình luận . '</td>
                            <td>' . $ngay_bl . '</td>
                        </tr>
                        <tr>
                            <td>' . $noi_dung . '</td>
                            <td>' . họ tên người bình luận . '</td>
                            <td>' . $ngay_bl . '</td>
                        </tr>
                        <tr>
                            <td>' . $noi_dung . '</td>
                            <td>' . họ tên người bình luận . '</td>
                            <td>' . $ngay_bl . '</td>
                        </tr>
                        <tr>
                            <td>' . $noi_dung . '</td>
                            <td>' . họ tên người bình luận . '</td>
                            <td>' . $ngay_bl . '</td>
                        </tr>
                    </table>
                    <div class="" style="margin-top: 60px;">
                        <!-- form bình luận -->
                        <form action="" method="post">
                            <input type="text" name="bl" id="" placeholder="Bình luận">
                            <button type="submit">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
            <iframe src="" frameborder="0"></iframe>
        </div> -->
            <div class="row mb">
                <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
                <div class="boxcontent">
                    <li id="ten_sp"><a href="' . $linksp . '">ten_sp</a></li>
                    <li id="ten_sp"><a href="' . $linksp . '">ten_sp</a></li>
                    <li id="ten_sp"><a href="' . $linksp . '">ten_sp</a></li>
                    <li id="ten_sp"><a href="' . $linksp . '">ten_sp</a></li>
                    <li id="ten_sp"><a href="' . $linksp . '">ten_sp</a></li>
                </div>
            </div>
        </div>
        <div class="boxphai">
            <?php //include "../boxright.php"; 
            ?>
            <div class="row mb">
                <div class="boxtitle">TÀI KHOẢN</div>
                <div class="boxcontent formtaikhoan">
                    <?php
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                    ?>
                        <div class="row mb10">
                            <img src="upload/<?php //echo $hinh 
                                                ?>" alt="avata" id="avata">
                            <h3>Xin chào, <?php //echo $ho_ten 
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
                    <?php    } ?>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtitle">DANH MỤC</div>
                <div class="boxcontent2 menudoc">
                    <ul>
                        <?php
                        // foreach ($dsdm as $dm) {
                        //     extract($dm);
                        //     $linkdm = "index.php?act=sanpham&iddm=" . $ma_loai;
                        //     echo '<li>
                        //             <a href="' . $linkdm . '">' . $ten_loai . '</a>
                        //         </li>';
                        // }
                        ?>
                        <li><a href="#">' . $ten_loai . '</a></li>
                        <li><a href="#">' . $ten_loai . '</a></li>
                        <li><a href="#">' . $ten_loai . '</a></li>
                        <li><a href="#">' . $ten_loai . '</a></li>
                        <li><a href="#">' . $ten_loai . '</a></li>
                        <li><a href="#">' . $ten_loai . '</a></li>
                        <li><a href="#">' . $ten_loai . '</a></li>
                        <li><a href="#">' . $ten_loai . '</a></li>
                        <li><a href="#">' . $ten_loai . '</a></li>
                    </ul>
                </div>
                <div class="boxfooter searbox">
                    <form action="index.php?act=sanpham" method="post">
                        <input type="text" name="search">
                        <input type="submit" name="timkiem" value="Tìm kiếm">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="boxtitle">TOP 10 YÊU THÍCH</div>
                <div class="boxcontent">
                    <div class="row mb10 top10">
                        <a href="#"><img src="https://tse3.mm.bing.net/th?id=OIP.uxuWn4Jhl-b9rFbaK43WnQHaIR&pid=Api&P=0" alt="ảnh"></a>
                        <a href="#">' . $ten_sp . '</a>
                    </div>
                    <div class="row mb10 top10">
                        <a href="#"><img src="https://tse3.mm.bing.net/th?id=OIP.uxuWn4Jhl-b9rFbaK43WnQHaIR&pid=Api&P=0" alt="ảnh"></a>
                        <a href="#">' . $ten_sp . '</a>
                    </div>
                    <div class="row mb10 top10">
                        <a href="#"><img src="https://tse3.mm.bing.net/th?id=OIP.uxuWn4Jhl-b9rFbaK43WnQHaIR&pid=Api&P=0" alt="ảnh"></a>
                        <a href="#">' . $ten_sp . '</a>
                    </div>
                    <div class="row mb10 top10">
                        <a href="#"><img src="https://tse3.mm.bing.net/th?id=OIP.uxuWn4Jhl-b9rFbaK43WnQHaIR&pid=Api&P=0" alt="ảnh"></a>
                        <a href="#">' . $ten_sp . '</a>
                    </div>
                    <div class="row mb10 top10">
                        <a href="#"><img src="https://tse3.mm.bing.net/th?id=OIP.uxuWn4Jhl-b9rFbaK43WnQHaIR&pid=Api&P=0" alt="ảnh"></a>
                        <a href="#">' . $ten_sp . '</a>
                    </div>
                    <div class="row mb10 top10">
                        <a href="#"><img src="https://tse3.mm.bing.net/th?id=OIP.uxuWn4Jhl-b9rFbaK43WnQHaIR&pid=Api&P=0" alt="ảnh"></a>
                        <a href="#">' . $ten_sp . '</a>
                    </div>

                    <?php
                    // foreach ($dstop10 as $sp) {
                    //     extract($sp);
                    //     $linksp = "index.php?act=sanphamct&idsp=" . $ma_sp;
                    //     $img = $img_path . $hinh;
                    //     echo '<div class="row mb10 top10">
                    //             <a href="' . $linksp . '"><img src="' . $img . '" alt=""></a>
                    //             <a href="' . $linksp . '">' . $ten_sp . '</a>
                    //         </div>';
                    // }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>