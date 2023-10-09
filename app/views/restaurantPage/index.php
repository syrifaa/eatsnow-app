<?php
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
    <section class="content">
        <section class="restaurant-img">
            <img src=<?php echo $photo?> alt="restoran" class="restaurant-img">
        </section>

        <section class="restaurant-info">
            <div class="restaurant-name"><?php echo $nama?><b class="div" id="resto_id"><?echo $restoID?></b></div>
            <div class="restaurant-category"><?php echo $categoty?></div>
            <div>
                <img src="/public/assets/vectors/pinpoint.svg" alt="pinpoint">
                <span><?php echo $address?></span>
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
                <span>Restaurant Rating</span>
            </div>
        </section>

        <section class="restaurant-desc">
            <?php echo $desc?>
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
    <a href="../restaurants/index.php" id="back-btn">
        <img src="../../../public/assets/img/back.png" alt="img">
    </a>
</body>
</html>