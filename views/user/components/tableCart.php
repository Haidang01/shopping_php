<?php
include '../../model/connectDb.php';
$iduser = $_SESSION['userId'];
$p = "SELECT `gio_hang`.`so_luong`, `gio_hang`.`id`, `san_pham`.`name`, `san_pham`.`price`, `san_pham`.`anh` FROM `gio_hang` JOIN `san_pham`ON `gio_hang`.`id_sp` = `san_pham`.`id` where `gio_hang`.`id_user` = $iduser"; //inner join để liên kết, gọi ra bảng kia để từ bảng này có thể gọi dữ liệu (bản ghi) của bảng kia ra sử dụng

$statement = $connect->prepare($p);
$statement->execute();
$gio_hang = $statement->fetchAll();
?>
<div style='backround:#f8f9fa;' class="py-3">
    <div class="">
        <div style='display:flex' class='d_flex mb-4 justify-content-between'>
            <h2 class='fs-3  d-inline'>Giỏ Hàng</h2>
            <p style="color: red;"><?php echo isset($_GET['mess']) ? $_GET['mess'] : ''; ?></p>
            <button class=''>
            </button>
        </div>
        <table class="table align-middle mb-0 bg-white table-bordered table-hover ">
            <thead class="bg-light ">
                <tr>
                    <th class="text-center">Sản Phẩm</th>
                    <th class="text-center">Đơn giá</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Tiền</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gio_hang as $pro) { ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="../../controllers/<?php echo $pro['anh']; ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"><?= $pro['name'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td width=20%>
                            <p class="fw-normal mb-1 text-center" style="color: red;"><?= number_format($pro['price'], 0, ',', '.') . " VNĐ"  ?></p>
                        </td>
                        <td width=10%>
                            <p class="text-muted mb-0 text-center"><?= $pro['so_luong'] ?></p>
                        </td>
                        <td width=20% style="color: red;" class="text-center"><?= number_format(($pro['price'] * $pro['so_luong']), 0, ',', '.') . " VNĐ" ?></td>
                        <td width=10%>
                            <a href="../../controllers/deleteCart.php?id=<?= $pro['id'] ?>" onclick="return confirm('Are you sure?');"><button type="button" class="btn btn-danger btn-sm btn-rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                    Delete
                                </button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>
</div>