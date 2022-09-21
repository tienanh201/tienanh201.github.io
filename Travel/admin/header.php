<?php
    session_start(); //Dịch vụ bảo vệ
    if(!isset($_SESSION['loginOK'])){
        header("Location:login.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/fontawesome-free-5.15.3-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="../font/fontawesome-free-5.15.3-web/css/all.min.css"> -->
    
    
    <title>Admin</title>
</head>

<body>

    <div class="header">
        <a href="index.php"><i class="fas fa-home"></i>Trang Chủ</a>

        <a href="booktour.php"><i class="fas fa-clipboard-list"></i>Đặt Tour</a>

        

   <a href="tour.php"><i class="fas fa-plane"></i>Tour</a>
        <a href="user.php"><i class="fas fa-user"></i>Tài Khoản</a>
        <a href="logout.php"><i class="fas fa-user-lock"></i>Đăng Xuất</a>
    </div>