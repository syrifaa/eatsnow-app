<?php 
require_once '../app/core/db.php';
require_once '../app/models/user.php';
session_start();

$user = new User;

// echo $_SESSION['email'];
// echo $_SESSION['name'];
// echo $_SESSION['password'];
// echo $_SESSION['profile_photo'];
// echo "      hhhhhhhh      ";

// $name = $_POST['name'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// echo $email;
// echo $password;
// echo $name;
// echo "      hhhhhhhh      ";

// $_SESSION['name'] = $name;
// $_SESSION['email'] = $email;
// $_SESSION['password'] = $password;

// echo $_SESSION['email'];
// echo $_SESSION['name'];
// echo $_SESSION['password'];
// echo $profile_img;

if(isset($_SESSION['email'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $profile_img = $_SESSION['profile_photo'];
        if (isset($_FILES['profile_photo'])) {
            $profile_img_tmp = $_FILES['profile_photo']['tmp_name'];
        
            if ($profile_img_tmp != "") {
                $profile_img = $_FILES['profile_photo']['name'];
                $_SESSION['profile_photo'] = $profile_img;
                move_uploaded_file($profile_img_tmp, "../public/assets/img/$profile_img");
            }
        }
        $user->updateUser($_SESSION['email'], $name, $email, $password, $profile_img);
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        echo $_SESSION['email'];
        echo $_SESSION['name'];
        echo $_SESSION['password'];

        echo "<script type='text/javascript'> alert('Update Successful'); </script>";
        echo "<script>location.href='../app/views/profile/index.php'</script>";
    } else {
        echo "<script type='text/javascript'> alert('Update Failed'); </script>";
        echo "<script>location.href='../app/views/profile/index.php'</script>";
    }
}
?>