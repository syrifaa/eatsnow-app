<?php

include_once 'sortButton.php';
include_once 'restaurantCard.php';
require_once 'app/models/restaurant.php';
require_once 'app/models/schedule.php';
$title  = "EatsNow";
$page = "Restaurant";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logo.png"/>
    <link rel="stylesheet" type="text/css" href="../../../public/css/sortButton.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/css/restaurantCard.css" />
    <link rel="stylesheet"  type="text/css" href="../../../public/css/restaurants.css" />
    <link rel="stylesheet" href="../../../public/css/navbar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="../../../public/js/sortButton.js"></script>
</head>
<body>
    <section class="header">
        <a href="/Home" class="logo">
            <img src="../../../public/assets/img/logo1.png"/>
        </a>
        <nav class="navbar">
            <?php include "app/views/navbar/index.php"; ?>
            <?php
            if(!isset($_SESSION['login'])){
                echo "<a href='/Login' class='login'>Login</a>";
                echo "<a href='/Register' class='signup'>SignUp</a>";
            }else{
                echo "<a href='../../../api/logout.php' class='login'>Logout</a>";
            }
            ?>        </nav>
        <div id ="menu-btn" class="fas fa-bars"></div>
    </section>
    <section class="menu-scroll">
        <div class="search-sort-filter">
            <input type="text" placeholder="Search" class="search">
            <div class="sort-filter">
                <div class="sort"> <?php echoSortButton() ?> </div>
                <div class="filter"> <?php echoSortButton() ?> </div>
            </div>
        </div>
    
        <!-- LIST OF RESTAURANTS -->
        <div class="restaurant-list">
            <?php
                $listRestaurants = new Restaurant;
                $listSchedule = new Schedule;

                $rowRestaurant = $listRestaurants->getAllRestaurants();
                
                while ($dataRestaurant = mysqli_fetch_array($rowRestaurant)) {
                    $rowSchedule = $listSchedule->getSchedule($dataRestaurant['resto_id']);
                    generateCard(
                        $dataRestaurant['resto_name'], 
                        $dataRestaurant['category'], 
                        $dataRestaurant['address'], 
                        $dataRestaurant['resto_desc'], 
                        $dataRestaurant['rating'],
                        $rowSchedule,
                        "../restaurantPage/index.php"
                    );
                }
            ?>
        </div>
    </section>
<script src="../../../public/js/navbar.js"></script>
</body>
</html>