<?php
if (!session_id()) {
    session_start();
}
$title  = "EatsNow";
$page = "Profile";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="../../../public/assets/img/logo.png"/>
    <link rel="stylesheet" href="../../../public/css/profile.css"/>
    <link rel="stylesheet" href="../../../public/css/navbar.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <section class="header">
        <a href="/Home" class="logo">
            <img src="../../../public/assets/img/logo1.png"/>
        </a>
        <nav class="navbar">
            <?php include "app/views/navbar/index.php"; ?>
            <?php
            if(!isset($_SESSION['login'])){
                echo "<a href='/Login' class='login'>Login</a>";
                echo "<a href='/Register' class='signup'>SignUp</a>";
            }else{
                echo "<a href='../../../api/logout.php' class='login'>Logout</a>";
            }
            ?>        
        </nav>
        <div id ="menu-btn" class="fas fa-bars"></div>
    </section>
    <section class="container">
        <div class="profile">
            <form class="form" action="/api/updateProfile.php" method="POST" enctype="multipart/form-data">
                <div class="image">
                    <div class="profile-container">
                        <div id="profileImage">
                            <img src="../../../public/assets/img/<?php echo $_SESSION['profile_photo']; ?>" 
                                alt="Profile Photo" id="profile-preview">
                        </div>
                    </div>
                    <input class="imageUpload" type="file" id="profile-img"
                        name="profile_photo" accept=".jpg,.jpeg,.png" capture>
                </div>
                <label for="name">Name</label><br>
                <input type="text" class="input-form" name="name" value="<?php echo $_SESSION['name']?>" required><br>
                <label for="email">Email</label><br>
                <input type="email" class="input-form" name="email" value=<?php echo $_SESSION['email']?> required><br>
                <label for="pw">Change Password</label><br>
                <input type="password" class="input-form" name="password" 
                    value="<?php echo $_SESSION['password']?>" required><br>

                <div class="update-btn">
                    <input class="update" type="submit" name="update" value="Update" href="">
                </div>
            </form>
        </div>
        <form class="subs-form" action="/api/subscribe.php" method="POST">
            <input class="subs" type="submit" name="subs" 
                value=<?php $_SESSION['subs'] == 1 ? print "Unsubscribe" : print "Subscribe"?> href="">
        </form>
    </section>
<script>
document.addEventListener("DOMContentLoaded", function() {
    setupImageUpload('#profileImage', '.imageUpload');
});
</script>
<script src="../../../public/js/navbar.js"></script>
<script src="../../../public/js/preview.js"></script>
</body>
</html>