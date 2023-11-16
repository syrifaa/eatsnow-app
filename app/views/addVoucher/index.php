<?php
include_once 'voucherCard.php';
$title = "EatsNow";
$page = "Add Voucher";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../../../public/css/sidebar.css"/>
    <link rel="stylesheet" href="../../../public/css/voucher.css"/>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logo.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
        <div class="voucher-list">
        <?php
            echo generateVoucherCard(
                "Voucher 1",
                100            );
            echo generateVoucherCard(
                "Voucher 2",
                200
            );
            ?>
        </div>
    </section>
    <a href="AddVoucher/Add" id="add-btn">
        <img src="../../../public/assets/img/add.png" alt="img">
    </a>
<script src="../../../public/js/sidebar.js"></script>
<script src="../../../public/js/voucher.js"></script>
</body>