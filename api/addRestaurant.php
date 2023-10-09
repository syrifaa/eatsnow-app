<?php 
require_once '../app/core/db.php';
require_once '../app/models/restaurant.php';
require_once '../app/models/schedule.php';
require_once '../app/models/food.php';
session_start();

$resto = new Restaurant;
$schedule = new Schedule;
$food = new Food;

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
            move_uploaded_file($resto_img_tmp, "../public/assets/img/$resto_img");
        }
    }
    $resto_vid = $_FILES['restaurant-vid']['name'];
    if (isset($_FILES['restaurant-vid'])) {
        $resto_vid_tmp = $_FILES['restaurant-vid']['tmp_name'];
    
        if ($resto_vid_tmp != "") {
            move_uploaded_file($resto_vid_tmp, "../public/assets/vid/$resto_vid");
        } if ($_FILES['restaurant-vid']['type'] == "") {
            echo "<script type='text/javascript'> alert('Video Size Exceeds Limit'); </script>";
            echo "<script>
            setTimeout(function () {
                window.history.back();
            }, 0);
            </script>"; 
        }
    }

    // echo $restoName;
    // echo $location;
    // echo $mondayOpen;
    // echo $mondayClose;
    // echo $tuesdayOpen;
    // echo $tuesdayClose;
    // echo $wednesdayOpen;
    // echo $wednesdayClose;
    // echo $thursdayOpen;
    // echo $thursdayClose;
    // echo $fridayOpen;
    // echo $fridayClose;
    // echo $saturdayOpen;
    // echo $saturdayClose;
    // echo $sundayOpen;
    // echo $sundayClose;
    // echo $rating;
    // echo $review;
    // echo $category;
    // echo $resto_img;
    // echo $resto_vid;

    $resto->insertRestaurant($restoName, $review, $location, $rating, $resto_img, $resto_vid, $category);
    $id = $resto->getLastID();
    $lastID = mysqli_fetch_assoc($id)['resto_id'];
    echo $lastID;
    $scheduleData = array(
        array('resto_id' => $lastID, 'day' => 'Monday', 'open_time' => $mondayOpen, 'close_time' => $mondayClose),
        array('resto_id' => $lastID, 'day' => 'Tuesday', 'open_time' => $tuesdayOpen, 'close_time' => $tuesdayClose),
        array('resto_id' => $lastID, 'day' => 'Wednesday', 'open_time' => $wednesdayOpen, 'close_time' => $wednesdayClose),
        array('resto_id' => $lastID, 'day' => 'Thursday', 'open_time' => $thursdayOpen, 'close_time' => $thursdayClose),
        array('resto_id' => $lastID, 'day' => 'Friday', 'open_time' => $fridayOpen, 'close_time' => $fridayClose),
        );
    foreach ($scheduleData as $data) {
        $schedule->insertSchedule($data);
    }
    $food->insertFoodToResto($lastID);
    echo "<script type='text/javascript'> alert('Restaurant Added Successfully'); </script>";
    echo "<script>location.href='../app/views/update/index.php'</script>";
}

?>