<?php
session_start();
$title  = "EatsNow";
$page = "Home";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logo.png"/>
    <link rel="stylesheet" href="../../../public/css/home.css"/>
    <link rel="stylesheet" href="../../../public/css/navbar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <section class="header">
        <a href="#" class="logo">
            <img src="../../../public/assets/img/logo1.png"/>
        </a>
        <nav class="navbar">
            <?php include "../navbar/index.php"; ?>
            <?php
            if(!isset($_SESSION['login'])){
                echo "<a href='../login/index.php' class='login'>Login</a>";
                echo "<a href='../signup/index.php' class='signup'>SignUp</a>";
            }else{
                echo "<a href='../../../api/logout.php' class='login'>Logout</a>";
            }
            ?>
        </nav>
        <div id ="menu-btn" class="fas fa-bars"></div>
    </section>
    <section class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
            <div class="slider">
                <img src="../../../public/assets/img/slide1.jpg" alt="img" draggable="false">
                <img src="../../../public/assets/img/slide2.jpg" alt="img" draggable="false">
                <img src="../../../public/assets/img/slide3.jpg" alt="img" draggable="false">
            </div>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </section>
    <section class="desc">
        <div class="desc1"> Discover the flavors of Jatinangor like never before with our <span>EatsNow!<span> </div>
        <div class="desc2"> Explore a diverse array of local dining establishments and their mouthwatering offerings, all at your fingertips. From the sizzling street food stalls to cozy family-owned eateries, our app is your gateway to an unforgettable culinary adventure in Jatinangor. </div>
    </section>
    <section class="footer">
        <div class="credit"> created by 
            <?php 
            if(isset($_SESSION['login'])) {
                if ($_SESSION['role']==1) {
                    echo "<a href='..\update\index.php'><span>H Team </span></a>";
                }
                else {
                    echo "<span>H Team </span>";
                }
            } else {
                echo "<span>H Team </span>";
            }
            ?>
            | all rights reserved! </div>
    </section>
<script src="../../../public/js/navbar.js"></script>
<script src="../../../public/js/slider.js"></script>
</body>
</html>