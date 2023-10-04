<?php
include_once 'editMenu.php';
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
    <a href="../update/index.php" id="close-btn">
        <img src="../../../public/assets/img/cross.png" alt="img">
    </a>
    <div class="container">
        <div class="image">
            <div class="container-img">
                <img class="img1" src="../../../public/assets/img/profile-img.png"/>
                <input class="restaurant-img" id="img1" type="file" 
                    name="img1" placeholder="Photo" required="" capture>
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
            <label class="title" for="Hours">Hours</label>
            <div class="hours">
                <div class="form-group">
                    <label class="form-control" for="monday">Monday</label>
                    <input type="time" class="form-control" id="monday-open">
                    <input type="time" class="form-control" id="monday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
                <div class="form-group">
                    <label class="form-control" for="tuesday">Tuesday</label>
                    <input type="time" class="form-control" id="tuesday-open">
                    <input type="time" class="form-control" id="tuesday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control" for="wednesday">Wednesday</label>
                    <input type="time" class="form-control" id="wednesday-open">
                    <input type="time" class="form-control" id="wednesday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
                <div class="form-group">
                    <label class="form-control" for="thursday">Thursday</label>
                    <input type="time" class="form-control" id="thursday-open">
                    <input type="time" class="form-control" id="thursday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
                <div class="form-group">
                    <label class="form-control" for="friday">Friday</label>
                    <input type="time" class="form-control" id="friday-open">
                    <input type="time" class="form-control" id="friday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
                <div class="form-group">
                    <label class="form-control" for="saturday">Saturday</label>
                    <input type="time" class="form-control" id="saturday-open">
                    <input type="time" class="form-control" id="saturday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
                <div class="form-group">
                    <label class="form-control" for="sunday">Sunday</label>
                    <input type="time" class="form-control" id="sunday-open">
                    <input type="time" class="form-control" id="sunday-close">
                    <div class="form-control">
                        <img class="remove-img" id="remove" src="../../../public/assets/img/remove.png"/>
                    </div>                
                </div>
            </div>
            <label class="title" for="rating">Rating</label>
            <input type="number" class="input-form" name="rating" min="0" max="5" step=".1" required>
            <label class="title" for="category">Category</label>
            <div class="custom-select">
                <div class="select-selected">Indonesian</div>
                <div class="select-items">
                    <div>Indonesian</div>
                    <div>Chinese</div>
                    <div>Japanese</div>
                    <div>Korean</div>
                    <div>Western</div>
                </div>
            </div>
            <label class="title" for="review">Review</label>
            <textarea class="textbox" name="review"></textarea>
            <label class="title" for="menu">Menu</label>
            <div class="menu-scroll">
                <div class="add-menu">
                    <a class="add-btn" id="add-btn">Add Menu</a>
                </div>
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <label class="title" for="menu-name">Name</label>
                        <input type="text" class="input-form" name="menu-name" required>
                        <label class="title" for="price">Price</label>
                        <input type="text" class="input-form" name="price" required>
                        <label class="title" for="desc">Description</label>
                        <textarea class="textbox" name="desc"></textarea>
                        <div class="modal-btn">
                            <a id="save">Save</a> 
                            <a id="cancel">Cancel</a>
                        </div>                
                    </div>
                </div>
                <!-- LIST OF MENU -->
                <div class="menu-list">
                    <?php generateCard() ?>
                    <?php generateCard() ?>
                    <?php generateCard() ?>
                    <?php generateCard() ?>
                    <?php generateCard() ?>
                </div>
            </div>
        </div>
        <div class="update">
            <a class="update-btn" id="update-btn">Update</a>
        </div>
    </div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setupImageUpload('.img1', '#img1');
        setupImageUpload('.img3', '#img3');
    });
</script>
<script src="../../../public/js/preview-img.js"></script>
<script src="../../../public/js/reset.js"></script>
<script src="../../../public/js/dropdown.js"></script>
<script src="../../../public/js/modal.js"></script>
</body>