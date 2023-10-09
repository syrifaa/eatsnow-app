<?php

if (!session_id()) { session_start(); }

require_once 'app/models/Restaurant.php';
require_once 'app/models/Food.php';
include_once 'menuCard.php';
require_once 'app/models/schedule.php';
$title = "EatsNow";
$page = "RestaurantPage";

$schedule = new Schedule;

// $photo = ($row['img_path'] == NULL) ? "/public/assets/img/rest1.svg" : $row['img_path'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logo.png"/>
    <link rel="stylesheet" href="/public/css/restaurantPage.css"/>    
    <link rel="stylesheet" href="/public/css/menuCard.css"/>    
    <!-- <script src='main.js'></script> -->
</head>
<body>
    <?php 
        $idRestaurant = $_GET['id'];
        $listRestaurants = new Restaurant;
        $rowRestaurant = $listRestaurants->getRestaurant($idRestaurant);
        $restaurantData = mysqli_fetch_assoc($rowRestaurant);

        $listFood = new Food;
        $rowFood = $listFood->getAllFood($idRestaurant);
    ?>
    <section class="content">
        <section class="restaurant-video">
            <video src="/public/assets/vid/nyam nyam kenyang.mp4" controls>
        </section>

        <section class="restaurant-info">
            <div class="restaurant-name">
                <?php echo $restaurantData['resto_name']?>
                <b class="div" id="resto_id"><?php echo $restaurantData['resto_id']?></b>
            </div>

            <div class="restaurant-category"><?php echo $restaurantData['category']; ?></div>
            <div>
                <img src="/public/assets/vectors/pinpoint.svg" alt="pinpoint">
                <span><?php echo $restaurantData['address']; ?></span>
            </div>
            <div>
                <img src="/public/assets/vectors/clock.svg" alt="clock">
                <span>Restaurant Schedule</span>
            </div>
            <div >
                <img src="/public/assets/vectors/review.svg" alt="review">
                <span>Restaurant Review</span>
            </div>
            <div>
                <img src="/public/assets/vectors/star.svg" alt="rating">
                <span><?php echo $restaurantData['rating'] ?></span>
            </div>
        </section>

        <section class="restaurant-desc">
            <?php echo $restaurantData['resto_desc'] ?>
        </section>

        <div class="menu-label">Menu</div>
        <!-- LIST OF MENU -->
        <div class="menu-list" id="menu-list">
        </div>
        <div id="pagination">
            <!-- PAGING BUTTON -->
        </div>
        <script src="../../../public/js/menu.js"></script>
    </section>
    <a href="/Restaurants" id="back-btn">
        <img src="../../../public/assets/img/back.png" alt="img">
    </a>
</body>
</html>