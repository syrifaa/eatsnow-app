<?php
include_once 'app/views/restaurants/restaurantCard.php';
include_once 'app/views/restaurants/sortButton.php';
include_once 'app/views/restaurants/filterButton.php';
require_once 'app/models/restaurant.php';
require_once 'app/models/schedule.php';

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
    <link rel="stylesheet" type="text/css" href="../../../public/css/sortFilter.css" />
    <link rel="stylesheet" href="../../../public/css/update.css"/>
    <link rel="stylesheet" href="../../../public/css/restaurantCard.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="../../../public/js/sortButton.js"></script>
</head>
<body>
    <section class="sidebar">
        <a href="/Home" class="logo">
            <img src="../../../public/assets/img/logo1.png"/>
        </a>
        <?php include "app/views/sidebar/index.php"; ?>
    </section>
    <section class="content">
        <div id ="menu-btn" class="fas fa-bars"></div>
        <div class="search-sort-filter">
            <input type="text" id="searchInput" placeholder="Search" class="search">
            <div class="sort-filter">
                <div class="sort"> <?php echoSortButton() ?> </div>
                <div class="filter"> <?php echoFilterButton() ?> </div>
            </div>
        </div>
        <div class="restaurant-list" id="list-restaurant">
        </div>
        <div id="pagination">
            <!-- paging button -->
        </div>
        <script src="../../../public/js/searchUpdate.js"></script>
    </section>
    <a href="Update/addRestaurant" id="add-btn">
        <img src="../../../public/assets/img/add.png" alt="img">
    </a>
<script src="../../../public/js/sidebar.js"></script>
</body>
