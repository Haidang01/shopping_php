<?php
session_start();
session_destroy();
header("location: ../views/user/home.php?mess=$thongbao");
?>