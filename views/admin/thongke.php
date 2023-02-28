<?php
include 'header.php';
include '../../model/connectDb.php';
$q1 = 'SELECT danh_muc.id,danh_muc.name, count(*) as "so_luong", min(san_pham.price) as "gia_min", max(san_pham.price) as "gia_max",AVG(san_pham.price) as "gia_avg" FROM `san_pham` join danh_muc on danh_muc.id=san_pham.id_dm group by danh_muc.id,danh_muc.name;';
$statement1 = $connect->prepare($q1);
$statement1->execute();
$thongke = $statement1->fetchAll();
?>
<div style='backround:#f8f9fa;' class="col  py-3">
  <div class="container p-4">
    <div style='display:flex' class='d_flex mb-4 justify-content-between'>
      <h2 class='fs-3  d-inline'>THỐNG KÊ HÀNG TỪNG LOẠI</h2>
      <!-- -------------------- -->
    </div>
    <table class="table align-middle mb-0 bg-white table-bordered table-hover ">
      <thead class="bg-light ">
        <tr>
          <th>Loại hàng</th>
          <th>Số lượng</th>
          <th>Giá thấp nhất</th>
          <th>Giá cao nhất</th>
          <th>Giá trung bình</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($thongke as $tke) { ?>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo $tke['name']; ?></p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1"><?php echo $tke['so_luong']; ?></p>
          </td>
          <td>
            <p class="text-muted mb-0"><?php echo number_format($tke['gia_min']); ?> VNĐ</p>
          </td>
          <td>
            <p class="text-muted mb-0"><span style="color: red;"><?php echo number_format($tke['gia_max']); ?> VNĐ
              </span></p>
          </td>
          <td>
            <p class="text-muted mb-0"><?php echo number_format($tke['gia_avg']); ?> VNĐ</p>
          </td>


        </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>

</div>
</div>
</div>