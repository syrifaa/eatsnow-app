<?php
include_once 'C:\Users\KennyB\Desktop\WBD\tugas-besar-1\app\views\navbar\navbar.php';
include_once 'sortButton.php';
include_once 'restaurantCard.php';
$title  = "EatsNow";
$page = "Home";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/public/css/sortButton.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/restaurantCard.css" />
    <link rel="stylesheet"  type="text/css" href="/public/css/restaurants.css" />
    <script src="/public/js/sortButton.js"></script>
</head>
<body>
    <section class="header">
        <a href="#" class="logo">
            <img src="../../../public/assets/img/logo1.png"/>
        </a>
        <nav class="navbar">
            <?php echoNavbar($page) ?>
            <!-- <a href="login.php" class="login">Login</a>
            <a href="signup.php" class="signup">SignUp</a> -->
        </nav>
        <div id ="menu-btn" class="fas fa-bars"></div>
    </section>

    <div class="search-sort-filter">
        <input type="text" placeholder="Search" class="search">
        <div class="sort"> <?php echoSortButton() ?> </div>
        <div class="filter"> <?php echoSortButton() ?> </div>
    </div>

    <!-- LIST OF RESTAURANTS -->
    <div class="restaurant-list">
        <?php generateCard() ?>
        <?php generateCard() ?>
        <?php generateCard() ?>
        <?php generateCard() ?>
        <?php generateCard() ?>
    </div>
</body>
</html>