<?php 
include_once '../app/views/restaurantPage/menuCard.php';
require_once '../app/core/db.php';

$con = new database;

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$itemsPerPage = 10;
$restoID = $_GET['restoID'];

function calculateTotalPages($itemsPerPage, $restoID){
    global $con;
    $query = "SELECT COUNT(*) FROM food WHERE resto_id = $restoID";
    $result = $con->execute($query);
    $row = mysqli_fetch_row($result);
    $totalItems = $row[0];
    $totalPages = ceil($totalItems / $itemsPerPage);
    // echo "total halaman: -----------$totalPages";
    return $totalPages;
}

function fetchDataByPage($con, $page, $itemsPerPage, $restoID){

    $offset = ($page - 1) * $itemsPerPage;
    $query = "SELECT * FROM food WHERE (resto_id = $restoID) LIMIT $offset, $itemsPerPage";
    // echo $query;
    $result = $con->execute($query);
    // echo $result;
    $cards = array();
    $counter = 0;
    while($row = mysqli_fetch_assoc($result)){
        $cards[] = generateFoodCard(
            $row['img_path'],
            $row['food_name'],
            $row['food_desc'],
            $row['price'],
        );
        $counter++;
    }
    // echo "counter: $counter";
    return $cards;
}

$data = fetchDataByPage($con, $page, $itemsPerPage, $restoID);
$totalPages = calculateTotalPages($itemsPerPage, $restoID);

$response = array(
    'data' => $data,
    'totalPages' => $totalPages
);

header('Content-Type: application/json');
echo json_encode($response);
?>