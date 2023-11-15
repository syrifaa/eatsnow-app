<?php 
require_once '../app/core/db.php';
require_once '../app/models/food.php';
session_start();

$food = new Food;
$conn = new Database;

$command = isset($_GET['command']) ? $_GET['command'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$desc = isset($_GET['desc']) ? $_GET['desc'] : '';
$path = isset($_GET['path']) ? $_GET['path'] : '';
$resto_id = isset($_GET['resto_id']) ? $_GET['resto_id'] : '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['menuImg'])) {
        $profile_img_tmp = $_FILES['menuImg']['tmp_name'];
    
        if ($profile_img_tmp != "") {
            $profile_img = $_FILES['menuImg']['name'];
            move_uploaded_file($profile_img_tmp, "../public/assets/img/$profile_img");
        }
    }
    echo "<script>
    setTimeout(function () {
        window.history.back();
    }, 0);
    </script>";

}
if ($command == 'add') {
    $query = $food->insertFood($name, $desc, $price, $path);
    $conn->execute($query);
} else if ($command == 'edit') {
    $query = $food->updateFood($id, $name, $desc, $price, $path);
    $conn->execute($query);
} else if ($command == 'remove') {
    $query = $food->deleteFood($id);
    $conn->execute($query);
}

$rowRestaurant = $food->getFoodById($resto_id);
while ($dataRestaurant = mysqli_fetch_array($rowRestaurant)) {
    generateCard(
        $dataRestaurant['food_id'],
        $dataRestaurant['food_name'],
        $dataRestaurant['food_desc'],
        $dataRestaurant['price'],
        $dataRestaurant['img_path']
    );
}



function generateCard($id, $name, $desc, $price, $path) {
    $card = <<<EOT
    <div class="menu" data-id=$id>
        <img src="../../../public/assets/img/$path" alt="menu" class="menu-img" menu-path=$path>
        <div class="menu-info">
            <div class="menu-name" menu-name="$name">$name</div>
            <div class="menu-desc" menu-desc="$desc">$desc</div>
        </div>
        <div class="menu-price" menu-price=$price>${price}</div>
        <img class="remove-img" id="remove-menu" src="../../../public/assets/img/remove.png"/>
        <img class="edit-img" id="edit-menu" src="../../../public/assets/img/edit.png"/>
    </div>
    EOT;
    echo $card;

}
?>