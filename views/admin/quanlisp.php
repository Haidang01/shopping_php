<?php
include 'header.php';
include '../../model/connectDb.php';
$q1 =
  "SELECT san_pham.id, san_pham.name, san_pham.anh, san_pham.price, san_pham.mo_ta, san_pham.luot_xem, san_pham.id_dm, danh_muc.name as 'cate_name' FROM `san_pham` LEFT JOIN `danh_muc` ON san_pham.id_dm = danh_muc.id ORDER BY san_pham.id DESC ";
$statement1 = $connect->prepare($q1);
$statement1->execute();
$product = $statement1->fetchAll();
?>

<div style='background:#f8f9fa;' class="col  py-3">
  <div class="container p-4">
    <div style='display:flex' class='d_flex mb-4 justify-content-between'>
      <h2 class='fs-3  d-inline'>Danh sách sản phẩm</h2>
      <p style="color: red;"><?php echo isset($_GET['mess']) ? $_GET['mess'] : ''; ?></p>

      <a href='formAddsp.php' class='btn btn-primary'>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg>
        Add a new product</a>
    </div>
    <table class="table align-middle mb-0 bg-white table-bordered table-hover ">
      <thead class="bg-light ">
        <tr>
          <th>Tên</th>
          <th>Giá</th>
          <th>Mô tả</th>
          <th>Lượt xem</th>
          <th>Danh mục</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($product as $pro) { ?>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <img src='../../controllers/<?= $pro['anh'] ?>' alt="" style="width: 45px; height: 45px ; object-fit:cover" class="rounded-circle" />
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?= $pro['name'] ?></p>
                </div>
              </div>
            </td>
            <td width=15%>
              <p class="text-muted mb-0"><span style="color: red;"><?= $pro['price'] ?> VNĐ</span></p>
            </td>
            <td width=25%>
              <p class="text-muted mb-0" style="font-size: 13px;"><?= $pro['mo_ta'] ?></p>
            </td>
            <td width=10%><?= $pro['luot_xem'] ?></td>
            <td width=15%><?= $pro['cate_name'] ?></td>
            <td width=20%>
              <a href="./editsp.php?id=<?= $pro['id'] ?>">
                <button type="button" class="btn btn-secondary btn-sm btn-rounded">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                  </svg>
                  Edit
                </button>
              </a>
              <a href="../../controllers/deleteSp.php?id=<?= $pro['id'] ?>" onclick="return confirm('Bạn có chắc k? ')">
                <button type="button" class="btn btn-danger btn-sm btn-rounded">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                  </svg>
                  Delete
                </button>
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</div>
</div>
</div>