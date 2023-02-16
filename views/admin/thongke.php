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
              <p class="text-muted mb-0"><?php echo number_format($tke['gia_max']); ?> VNĐ</p>
            </td>
            <td>
              <p class="text-muted mb-0"><?php echo number_format($tke['gia_avg']); ?> VNĐ</p>
            </td>


          </tr>
        <?php } ?>
      </tbody>
    </table>
    <a href="" class="btn btn-secondary btn-sm btn-rounded">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
      </svg>
      Xem biểu đồ
    </a>
  </div>

</div>
</div>
</div>