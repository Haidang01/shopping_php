<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
  span {
    color: white;
    font-weight: 400;
  }

  span:hover {
    color: #6d7fcc;
  }

  li:hover {
    background: #fff;
    transition: background 0.5s ease-out;
    border-radius: 3px;
  }

  .bgSidebar {
    background-color: #6d7fcc;
  }
  </style>
</head>

<body>
  <div class="container-fluid" style='height:100vh ; overflow:scroll-y; '>
    <div class="row flex-nowrap  ">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bgSidebar fixed ">
        <a href="../user/home.php"
          class="d-flex align-items-center mt-4 mx-2 pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <h2 class="fs-4 fw-bold d-none d-sm-inline mt-1 mx-1">Shopping Xshop</h2>
        </a>
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
          <ul class="nav nav-pills flex-column mb-sm-auto gap-2 mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item px-2">
              <a href="quanliuser.php" class="nav-link align-middle px-0">
                <span class="ms-1 d-none d-sm-inline ">Quản lí người dùng</span>
              </a>
            </li>
            <li class="nav-item px-2">
              <a href="quanlidm.php" class="nav-link align-middle px-0">
                <span class="ms-1 d-none d-sm-inline">Quản lí danh mục</span>
              </a>
            </li>
            <li class="nav-item px-2">
              <a href="quanlisp.php" class="nav-link align-middle px-0">
                <span class="ms-1 d-none d-sm-inline">Quản lí sản phẩm</span>
              </a>
            </li>
            <li class="nav-item px-2">
              <a href="quanlibl.php" class="nav-link align-middle px-0">
                <span class="ms-1 d-none d-sm-inline">Quản lí bình luận</span>
              </a>
            </li>
        </div>
      </div>