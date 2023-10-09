<?php
// include_once 'editMenu.php';
if (!isset($_SESSION)) { session_start(); }
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
    <link rel="stylesheet" href="../../../public/css/editMenu.css"/>
</head>
<body>
    <a href="/Update" id="close-btn">
        <img src="../../../public/assets/img/cross.png" alt="img">
    </a>
    <form class="container" action="/api/addRestaurant.php" method="POST" enctype="multipart/form-data">
        <div class="image">
            <div class="container-img">
                <div class="image-container">
                    <div id="imgUpload"></div>
                </div>
                <input class="imgUpload" type="file" name="restaurant-img"
                    required="" accept=".jpg,.jpeg,.png" capture>
            </div>
            <div class="container-img">
                <div class="image-container">
                    <div id="videoUpload"></div>
                </div>
                <input class="videoUpload" type="file" name="restaurant-vid"
                    required="" accept=".gif,.mp4" capture>
            </div>
        </div>
        <div class="form">
            <label class="title" for="restaurant-name">Restaurant Name</label>
            <input type="text" class="input-form" id="restaurant-name" name="restaurant-name" required>
            <label class="title" for="location">Location</label>
            <input type="text" class="input-form" id="location" name="location" required>
            <label class="title">Hours</label>
            <div class="hours">
                <div class="form-group">
                    <label class="form-control">Monday</label>
                    <input type="time" class="form-control" id="monday-open" name="monday-open">
                    <input type="time" class="form-control" id="monday-close" name="monday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
                <div class="form-group">
                    <label class="form-control">Tuesday</label>
                    <input type="time" class="form-control" id="tuesday-open" name="tuesday-open">
                    <input type="time" class="form-control" id="tuesday-close" name="tuesday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control">Wednesday</label>
                    <input type="time" class="form-control" id="wednesday-open" name="wednesday-open">
                    <input type="time" class="form-control" id="wednesday-close" name="wednesday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
                <div class="form-group">
                    <label class="form-control">Thursday</label>
                    <input type="time" class="form-control" id="thursday-open" name="thursday-open">
                    <input type="time" class="form-control" id="thursday-close" name="thursday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
                <div class="form-group">
                    <label class="form-control">Friday</label>
                    <input type="time" class="form-control" id="friday-open" name="friday-open">
                    <input type="time" class="form-control" id="friday-close" name="friday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
                <div class="form-group">
                    <label class="form-control">Saturday</label>
                    <input type="time" class="form-control" id="saturday-open" name="saturday-open">
                    <input type="time" class="form-control" id="saturday-close" name="saturday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
                <div class="form-group">
                    <label class="form-control">Sunday</label>
                    <input type="time" class="form-control" id="sunday-open" name="sunday-open">
                    <input type="time" class="form-control" id="sunday-close" name="sunday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
            </div>
            <label class="title" for="rating">Rating</label>
            <input type="number" class="input-form" id="rating" name="rating" min="0" max="5" step=".1" required>
            <label class="title">Category</label>
            <div class="custom-select">
                <div class="select-selected" id="selectedCategory">Indonesian</div>
                <div class="select-items">
                    <div>Indonesian</div>
                    <div>Chinese</div>
                    <div>Japanese</div>
                    <div>Korean</div>
                    <div>Western</div>
                </div>
                <input type="hidden" id="category" name="category">
            </div>
            <label class="title" for="review">Review</label>
            <textarea class="textbox" id="review" name="review"></textarea>
            <label class="title">Menu</label>
            <div class="menu-scroll">
                <div class="add-menu">
                    <a class="add-btn" id="add-btn">Add Menu</a>
                </div>
                <div id="modal" class="modal">
                    <!-- GENERATE MODAL -->
                </div>
                <!-- LIST OF MENU -->
                <div class="menu-list">
                    <?php
                        // generateCard();
                    ?>
                </div>
            </div>
        </div>
        <div class="update">
            <input class="update-btn" id="update-btn" type="submit" name="update" value="Update" href="">
        </div>
    </form>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setupImageUpload('#imgUpload', '.imgUpload');
        setupImageUpload('#videoUpload', '.videoUpload');
        // setupImageUpload('#menuUpload', '.menuUpload');
    });
</script>
<script src="../../../public/js/preview.js"></script>
<script src="../../../public/js/reset.js"></script>
<script src="../../../public/js/dropdown.js"></script>
<script src="../../../public/js/modal.js"></script>
</body>