<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="/shopping_php/css/chitiet.css">
  <link rel="stylesheet" href="/shopping_php/css/home.css">
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3 py-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Xshop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="home.php">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Giỏ hàng</a>
            </li>
            <?php
            session_start();
            if (!isset($_SESSION['userId'])) {
                echo "<li class='nav-item'>
              <a class='nav-link' href='login.php'>Đăng nhập</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='signup.php'>Đăng ký</a>
            </li>";
            }
            ?>

            <li class="nav-item">
              <a class="nav-link " href='/shopping_php/views/admin/index.php' style="color: red">Admin</a>
            </li>
          </ul>
          <?php if (isset($_SESSION['userId'])) {
              echo '<div class="dropdown pb-3 pt-3">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
              id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
            </a>
            <ul class="dropdown-menu dropdown-menu-light text-small shadow">
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="/shopping_php/controllers/logout.php" >Sign out</a></li>
            </ul>
          </div>';
              echo $_SESSION['username'];
          } else {
              echo '<form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>';
          } ?>
        </div>
      </div>
    </nav>