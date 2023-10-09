<?php
include_once 'menuCard.php';
require_once '../../models/restaurant.php';
require_once '../../models/schedule.php';
$title = "EatsNow";
$page = "RestaurantPage";
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
    <script src='main.js'></script>
</head>
<body>
    <section class="content">
        <section class="restaurant-video">
            <video src="/public/assets/vid/nyam nyam kenyang.mp4" controls>
        </section>

        <section class="restaurant-info">
            <div class="restaurant-name">Restaurant Name</div>
            <div class="restaurant-category">Restaurant Category</div>
            <div>
                <img src="/public/assets/vectors/pinpoint.svg" alt="pinpoint">
                <span>Jalan Raya, Cileunyi Wetan, Cileunyi, Bandung Regency, West Java 40622</span>
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
            jadi ini konsepnya open kitchen gt yhh, pertama kali yg dicobain potongan bebeknya,,, pas masuk mulut reflek ngomong ANJIR MAKANAN SURGA 😫😫😫 nasi hainannya ENAK BGT super wangi dari pas nunggu makanannya SUMPAH WANGI BGT jadi bikin makin laper, kuahnya juga enak gurih ga hambar, es tehnya seger bgt terus ga terlalu manis, omuricenya porsi nya mayan banyaaaak, di atas nya ada telor yg agak setengah mateng wicis kesukaan ak hehe…. bebek nya juga enak dhhhh bingung diapain tp dapet nya yg ada yg banyak tulang nya hiks kureng sedekah kh tp ga semua sieh ((dr kita bertiga)), kwotienya mayan kecil tp sebanding sm harganya yg AFFORDABLE BGT 10k doang??? enak bgt lg mau nangis sumpah
        </section>

        <div class="menu-label">Menu</div>
        <div class="menu-list">
            <?php generateCard() ?>
            <?php generateCard() ?>
            <?php generateCard() ?>
            <?php generateCard() ?>
            <?php generateCard() ?>
        </div>
    </section>
    <a href="../restaurants/index.php" id="back-btn">
        <img src="../../../public/assets/img/back.png" alt="img">
    </a>
</body>
</html>