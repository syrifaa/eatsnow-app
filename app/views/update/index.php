<?php
include_once '../restaurants/restaurantCard.php';
$title = "EatsNow";
$page = "Update";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logo.png"/>
    <link rel="stylesheet" href="../../../public/css/update.css"/>
    <link rel="stylesheet" href="../../../public/css/restaurantCard.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <section class="sidebar">
        <a href="../home/index.php" class="logo">
            <img src="../../../public/assets/img/logo1.png"/>
        </a>
        <?php include "../sidebar/index.php"; ?>
    </section>
    <section class="content">
        <div id ="menu-btn" class="fas fa-bars"></div>
        <div class="restaurant-list">
            <?php generateCard("../update/editPage.php") ?>
            <?php generateCard("../update/editPage.php") ?>
            <?php generateCard("../update/editPage.php") ?>
            <?php generateCard("../update/editPage.php") ?>
            <?php generateCard("../update/editPage.php") ?>
        </div>
    </section>
    <a href="../add/index.php" id="add-btn">
        <img src="../../../public/assets/img/add.png" alt="img">
    </a>
<script src="../../../public/js/sidebar.js"></script>
</body>
