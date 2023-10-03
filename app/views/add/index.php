<?php
include_once '../restaurants/restaurantCard.php';
$title = "EatsNow";
$page = "Add";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logo.png"/>
    <link rel="stylesheet" href="../../../public/css/add.css"/>
</head>
<body>
    <div class="container">
        <div class="image">
            <div class="container-img">
                <img class="img1" src="../../../public/assets/img/profile-img.png"/>
                <input class="restaurant-img" id="img1" type="file" 
                    name="img1" placeholder="Photo" required="" capture>
            </div>
            <div class="container-img">
                <img class="img2" src="../../../public/assets/img/profile-img.png"/>
                <input class="restaurant-img" id="img2" type="file" 
                    name="img2" placeholder="Photo" required="" capture>
            </div>
            <div class="container-img">
                <img class="img3" src="../../../public/assets/img/profile-img.png"/>
                <input class="restaurant-img" id="img3" type="file" 
                    name="img3" placeholder="Photo" required="" capture>
            </div>
        </div>
        <div class="form">
            <label class="title" for="restaurant-name">Restaurant Name</label>
            <input type="text" class="input-form" name="restaurant-name" required>
            <label class="title" for="location">Location</label>
            <input type="text" class="input-form" name="location" required>
            <label class="title" for="rating">Rating</label>
            <input type="text" class="input-form" name="rating" required>
        </div>
    </div>
    <a href="../update/index.php" id="close-btn">
        <img src="../../../public/assets/img/cross.png" alt="img">
    </a>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setupImageUpload('.img1', '#img1');
        setupImageUpload('.img2', '#img2');
        setupImageUpload('.img3', '#img3');
    });
</script>
<script src="../../../public/js/preview-img.js"></script>
</body>