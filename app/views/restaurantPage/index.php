<?php
require_once 'app/models/Restaurant.php';
require_once 'app/models/Food.php';
include_once 'menuCard.php';
require_once '../../models/restaurant.php';
require_once '../../models/schedule.php';
$title = "EatsNow";
$page = "RestaurantPage";
$restoID = $_GET['restoID'];

$restaurant = new Restaurant;
$schedule = new Schedule;

$resto = $restaurant->getRestaurant($restoID);
$restoData = array();
$row = mysqli_fetch_assoc($resto);
$nama = $row['resto_name'];
$categoty = $row['category'];
$address = $row['address'];
$desc = $row['resto_desc'];
$photo = ($row['img_path'] == NULL) ? "/public/assets/img/rest1.svg" : $row['img_path'];


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
        // var_dump($restaurantData);
        $listFood = new Food;
        $rowFood = $listFood->getFood($idRestaurant);
    ?>
    <section class="content">
        <section class="restaurant-video">
            <video src="/public/assets/vid/nyam nyam kenyang.mp4" controls>
        </section>

        <section class="restaurant-info">
            <div class="restaurant-name"><?php echo $restaurantData['resto_name']; ?></div>
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