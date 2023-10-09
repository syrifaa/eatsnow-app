<?php 
require_once '../app/core/db.php';
require_once '../app/models/restaurant.php';
session_start();

$resto = new Restaurant;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $restoName = $_POST['restaurant-name'];
    $location = $_POST['location'];
    $mondayOpen = $_POST['monday-open'];
    $mondayClose = $_POST['monday-close'];
    $tuesdayOpen = $_POST['tuesday-open'];
    $tuesdayClose = $_POST['tuesday-close'];
    $wednesdayOpen = $_POST['wednesday-open'];
    $wednesdayClose = $_POST['wednesday-close'];
    $thursdayOpen = $_POST['thursday-open'];
    $thursdayClose = $_POST['thursday-close'];
    $fridayOpen = $_POST['friday-open'];
    $fridayClose = $_POST['friday-close'];
    $saturdayOpen = $_POST['saturday-open'];
    $saturdayClose = $_POST['saturday-close'];
    $sundayOpen = $_POST['sunday-open'];
    $sundayClose = $_POST['sunday-close'];
    $rating = $_POST['rating'];
    // $category = isset($_GET['selectedCategory']) ? $_GET['selectedCategory'] : 'null';
    $category = $_POST['category'];
    $review = $_POST['review'];
    $resto_img = $_FILES['restaurant-img']['name'];
    if (isset($_FILES['restaurant-img'])) {
        $resto_img_tmp = $_FILES['restaurant-img']['tmp_name'];
    
        if ($resto_img_tmp != "") {
            echo "masukk";
            move_uploaded_file($resto_img_tmp, "../public/assets/img/$resto_img");
        }
    }
    $resto_vid = $_FILES['restaurant-vid']['name'];
    if (isset($_FILES['restaurant-vid'])) {
        $resto_vid_tmp = $_FILES['restaurant-vid']['tmp_name'];
    
        if ($resto_vid_tmp != "") {
            echo "masuk";
            move_uploaded_file($resto_vid_tmp, "../public/assets/vid/$resto_vid");
        }
    }
    echo $restoName;
    echo $location;
    echo $mondayOpen;
    echo $mondayClose;
    echo $tuesdayOpen;
    echo $tuesdayClose;
    echo $wednesdayOpen;
    echo $wednesdayClose;
    echo $thursdayOpen;
    echo $thursdayClose;
    echo $fridayOpen;
    echo $fridayClose;
    echo $saturdayOpen;
    echo $saturdayClose;
    echo $sundayOpen;
    echo $sundayClose;
    echo $rating;
    echo $review;
    echo $category;
    echo $resto_img;
    echo $resto_vid;
}

?>