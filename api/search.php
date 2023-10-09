<?php

include_once '../app/views/restaurants/sortButton.php';
include_once '../app/views/restaurants/restaurantCard.php';
require_once '../app/core/db.php';
require_once '../app/models/schedule.php';
$con = new database;

$listSchedule = new Schedule;

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$itemsPerPage = 2;

$action = $_GET['action'];
if($action == 'user'){
    $link = "../restaurantPage/index.php";
}else if($action == 'admin'){
    $link = "editPage.php";
}

function calculateTotalPages($conn, $itemsPerPage) {
    $query = "SELECT COUNT(*) as total FROM restaurant"; // Sesuaikan dengan nama tabel Anda
    $result = $conn->execute($query);
    $totalRows = mysqli_fetch_assoc($result)['total'];
    return ceil($totalRows / $itemsPerPage);
}

function calculateTotalPagesBySearch($conn, $itemsPerPage, $searchTerm) {
    $query = "SELECT COUNT(*) as total FROM restaurant WHERE resto_name LIKE '%$searchTerm%' OR address LIKE '%$searchTerm%'"; // Sesuaikan dengan nama tabel Anda
    $result = $conn->execute($query);
    $totalRows = mysqli_fetch_assoc($result)['total'];
    return ceil($totalRows / $itemsPerPage);
}

function calculateTotalPagesBySort($conn, $itemsPerPage, $sortOption, $catOption) {
    $query = "SELECT COUNT(*) as total FROM restaurant ";
    if ($catOption == 'alphabet') {
        $query .= "ORDER BY resto_name $sortOption";
    } else if ($catOption == 'rating') {
        $query .= "ORDER BY rating $sortOption";
    }
    $result = $conn->execute($query);
    $totalRows = mysqli_fetch_assoc($result)['total'];
    return ceil($totalRows / $itemsPerPage);
}

function calculateTotalPagesByFilter($conn, $itemsPerPage, $filterOption, $typeOption) {
    $query = "SELECT COUNT(*) as total FROM restaurant ";
    if ($typeOption == 'category') {
        $query .= "WHERE category = '$filterOption'";
    } else if ($typeOption == 'rating') {
        $query .= "WHERE rating >= $filterOption";
    }
    $result = $conn->execute($query);
    $totalRows = mysqli_fetch_assoc($result)['total'];
    return ceil($totalRows / $itemsPerPage);
}

function calculateTotalPagesBySearchFilter($conn, $itemsPerPage, $searchTerm, $filterOption, $typeOption) {
    $query = "SELECT COUNT(*) as total FROM restaurant WHERE (resto_name LIKE '%$searchTerm%' OR address LIKE '%$searchTerm%') ";
    if ($typeOption == 'category') {
        $query .= "AND category = '$filterOption'";
    } else if ($typeOption == 'rating') {
        $query .= "AND rating >= $filterOption";
    }
    $result = $conn->execute($query);
    $totalRows = mysqli_fetch_assoc($result)['total'];
    return ceil($totalRows / $itemsPerPage);
}

function calculateTotalPagesBySearchSortFilter($conn, $itemsPerPage, $searchTerm, $sortOption, $catOption, $filterOption, $typeOption) {
    $query = "SELECT COUNT(*) as total FROM restaurant WHERE (resto_name LIKE '%$searchTerm%' OR address LIKE '%$searchTerm%') ";
    if ($typeOption == 'category') {
        $query .= "AND category = '$filterOption'";
    } else if ($typeOption == 'rating') {
        $query .= "AND rating >= $filterOption";
    }
    if ($catOption == 'alphabet') {
        $query .= "ORDER BY resto_name $sortOption";
    } else if ($catOption == 'rating') {
        $query .= "ORDER BY rating $sortOption";
    }
    $result = $conn->execute($query);
    $totalRows = mysqli_fetch_assoc($result)['total'];
    return ceil($totalRows / $itemsPerPage);
}

function fetchDataByPage($conn, $page, $itemsPerPage, $listSchedule, $link) {
    $offset = ($page - 1) * $itemsPerPage;
    $query = "SELECT * FROM restaurant LIMIT $offset, $itemsPerPage"; // Sesuaikan dengan nama tabel Anda
    $result = $conn->execute($query);
    // echo $result;
    $cards = array();

    while($row = mysqli_fetch_assoc($result)) {
        $rowSchedule = $listSchedule->getSchedule($row['resto_id']);
        $cards[] = generateCard(
            $row['resto_name'],
            $row['category'],
            $row['address'],
            $row['resto_desc'],
            $row['rating'],
            $rowSchedule,
            $link, $row['resto_id']
        );
    }

    return $cards;
}

function fetchDataByPageSort($conn, $page, $itemsPerPage, $listSchedule, $sortOption, $catOption, $link){
    $offset = ($page - 1) * $itemsPerPage;
    $query = 'SELECT * FROM restaurant ';
    if ($catOption == 'alphabet') {
        $query .= "ORDER BY resto_name $sortOption";
    } else if ($catOption == 'rating') {
        $query .= "ORDER BY rating $sortOption";
    }
    $query .= " LIMIT $offset, $itemsPerPage";
    $result = $conn->execute($query);
    $cards = array();

    while($row = mysqli_fetch_assoc($result)) {
        $rowSchedule = $listSchedule->getSchedule($row['resto_id']);
        $cards[] = generateCard(
            $row['resto_name'],
            $row['category'],
            $row['address'],
            $row['resto_desc'],
            $row['rating'],
            $rowSchedule,
            $link, $row['resto_id']
        );
    }
    return $cards;
}

function fetchDataByPageFilter($conn, $page, $itemsPerPage, $listSchedule, $filterOption, $typeOption, $link){
    $offset = ($page - 1) * $itemsPerPage;
    $query = 'SELECT * FROM restaurant ';
    if ($typeOption == 'category') {
        $query .= "WHERE category = '$filterOption'";
    } else if ($typeOption == 'rating') {
        $query .= "WHERE rating >= $filterOption";
    }
    $query .= " LIMIT $offset, $itemsPerPage";
    $result = $conn->execute($query);
    $cards = array();

    while($row = mysqli_fetch_assoc($result)) {
        $rowSchedule = $listSchedule->getSchedule($row['resto_id']);
        $cards[] = generateCard(
            $row['resto_name'],
            $row['category'],
            $row['address'],
            $row['resto_desc'],
            $row['rating'],
            $rowSchedule,
            $link, $row['resto_id']
        );
    }
    return $cards;
}

function fetchDataBySortFilter($conn, $page, $itemsPerPage, $listSchedule, $sortOption, $catOption, $filterOption, $typeOption, $link){
    $offset = ($page - 1) * $itemsPerPage;
    $query = 'SELECT * FROM restaurant ';
    if ($typeOption == 'category') {
        $query .= "WHERE category = '$filterOption'";
    } else if ($typeOption == 'rating') {
        $query .= "WHERE rating >= $filterOption";
    }
    if ($catOption == 'alphabet') {
        $query .= "ORDER BY resto_name $sortOption";
    } else if ($catOption == 'rating') {
        $query .= "ORDER BY rating $sortOption";
    }
    $query .= " LIMIT $offset, $itemsPerPage";
    $result = $conn->execute($query);
    $cards = array();

    while($row = mysqli_fetch_assoc($result)) {
        $rowSchedule = $listSchedule->getSchedule($row['resto_id']);
        $cards[] = generateCard(
            $row['resto_name'],
            $row['category'],
            $row['address'],
            $row['resto_desc'],
            $row['rating'],
            $rowSchedule,
            $link, $row['resto_id']
        );
    }
    return $cards;
}

function fetchDataByPageAndSearch($conn, $page, $itemsPerPage, $searchTerm, $listSchedule, $link) {
    $offset = ($page - 1) * $itemsPerPage;
    $query = "SELECT * FROM restaurant WHERE resto_name LIKE '%$searchTerm%' OR address LIKE '%$searchTerm%' LIMIT $offset, $itemsPerPage"; // Sesuaikan dengan nama tabel Anda dan nama kolom yang sesuai
    $result = $conn->execute($query);
    $cards = array();

    while($row = mysqli_fetch_assoc($result)) {
        $rowSchedule = $listSchedule->getSchedule($row['resto_id']);
        $cards[] = generateCard(
            $row['resto_name'],
            $row['category'],
            $row['address'],
            $row['resto_desc'],
            $row['rating'],
            $rowSchedule,
            $link, $row['resto_id']
        );
    }

    return $cards;
}

function fetchDataBySearchSort($conn, $page, $itemsPerPage, $searchTerm, $listSchedule, $sortOption, $catOption, $link){
    $offset = ($page - 1) * $itemsPerPage;
    $query = "SELECT * FROM restaurant WHERE (resto_name LIKE '%$searchTerm%' OR address LIKE '%$searchTerm%') ";
    if ($catOption == 'alphabet') {
        $query .= "ORDER BY resto_name $sortOption";
    } else if ($catOption == 'rating') {
        $query .= "ORDER BY rating $sortOption";
    }
    $query .= " LIMIT $offset, $itemsPerPage";
    $result = $conn->execute($query);
    $cards = array();
    // echo $query;

    while($row = mysqli_fetch_assoc($result)) {
        $rowSchedule = $listSchedule->getSchedule($row['resto_id']);
        $cards[] = generateCard(
            $row['resto_name'],
            $row['category'],
            $row['address'],
            $row['resto_desc'],
            $row['rating'],
            $rowSchedule,
            $link, $row['resto_id']
        );
        // echo $row['resto_name'];
    }
    return $cards;
}

function fetchDataBySearchFilter($conn, $page, $itemsPerPage, $searchTerm, $listSchedule, $filterOption, $typeOption, $link){
    $offset = ($page - 1) * $itemsPerPage;
    $query = "SELECT * FROM restaurant WHERE (resto_name LIKE '%$searchTerm%' OR address LIKE '%$searchTerm%') ";
    if ($typeOption == 'category') {
        $query .= "AND category = '$filterOption'";
    } else if ($typeOption == 'rating') {
        $query .= "AND rating >= $filterOption";
    }
    $query .= " LIMIT $offset, $itemsPerPage";
    $result = $conn->execute($query);
    $cards = array();
    // echo $query;

    while($row = mysqli_fetch_assoc($result)) {
        $rowSchedule = $listSchedule->getSchedule($row['resto_id']);
        $cards[] = generateCard(
            $row['resto_name'],
            $row['category'],
            $row['address'],
            $row['resto_desc'],
            $row['rating'],
            $rowSchedule,
            $link, $row['resto_id']
        );
        // echo $row['resto_name'];
    }
    return $cards;
}

function fetchDataBySearchSortFilter($conn, $page, $itemsPerPage, $searchTerm, $listSchedule, $sortOption, $catOption, $filterOption, $typeOption, $link){
    $offset = ($page - 1) * $itemsPerPage;
    $query = "SELECT * FROM restaurant WHERE (resto_name LIKE '%$searchTerm%' OR address LIKE '%$searchTerm%') ";
    if ($typeOption == 'category') {
        $query .= "AND category = '$filterOption'";
    } else if ($typeOption == 'rating') {
        $query .= "AND rating >= $filterOption";
    }
    if ($catOption == 'alphabet') {
        $query .= "ORDER BY resto_name $sortOption";
    } else if ($catOption == 'rating') {
        $query .= "ORDER BY rating $sortOption";
    }
    $query .= " LIMIT $offset, $itemsPerPage";
    $result = $conn->execute($query);
    $cards = array();
    // echo $query;

    while($row = mysqli_fetch_assoc($result)) {
        $rowSchedule = $listSchedule->getSchedule($row['resto_id']);
        $cards[] = generateCard(
            $row['resto_name'],
            $row['category'],
            $row['address'],
            $row['resto_desc'],
            $row['rating'],
            $rowSchedule,
            $link, $row['resto_id']
        );
        // echo $row['resto_name'];
    }
    return $cards;
}

// Ambil data pengguna berdasarkan halaman dan hasil pencarian
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$sortOption = isset($_GET['sort_option']) ? $_GET['sort_option'] : 'null';
$catOption = isset($_GET['cat_option']) ? $_GET['cat_option'] : 'null';
$filterOption = isset($_GET['filter_option']) ? $_GET['filter_option'] : 'null';
$typeOption = isset($_GET['type_option']) ? $_GET['type_option'] : 'null';

$sortOption = in_array($sortOption, ['asc', 'desc','none']) ? $sortOption : 'none';
$catOption = in_array($catOption, ['alphabet', 'rating', 'none']) ? $catOption : 'none';
$filterOption = in_array($filterOption, ['Indonesian', 'Western', 'Italian', 'Chinese', 'Japanese', 'Korean', 'Thai', 'Indian', 'Other', '4', 'none']) ? $filterOption : 'none';
$typeOption = in_array($typeOption, ['category', 'rating', 'none']) ? $typeOption : 'none';


if (!empty($searchTerm)) {
    if($sortOption != 'none' && $filterOption != 'none'){
        $data = fetchDataBySearchSortFilter($con, $page, $itemsPerPage, $searchTerm, $listSchedule, $sortOption, $catOption, $filterOption, $typeOption, $link);
        $totalPages = calculateTotalPagesBySearchSortFilter($con, $itemsPerPage, $searchTerm, $sortOption, $catOption, $filterOption, $typeOption);
    }
    else if ($sortOption != 'none'){
        $data = fetchDataBySearchSort($con, $page, $itemsPerPage, $searchTerm, $listSchedule, $sortOption, $catOption, $link);
        $totalPages = calculateTotalPagesBySearch($con, $itemsPerPage, $searchTerm);
    }
    else if ($filterOption != 'none'){
        $data = fetchDataBySearchFilter($con, $page, $itemsPerPage, $searchTerm, $listSchedule, $filterOption, $typeOption, $link);
        $totalPages = calculateTotalPagesBySearchFilter($con, $itemsPerPage, $searchTerm, $filterOption, $typeOption);
    }
    else {
        $data = fetchDataByPageAndSearch($con, $page, $itemsPerPage, $searchTerm, $listSchedule, $link);
        $totalPages = calculateTotalPagesBySearch($con, $itemsPerPage, $searchTerm);
    }
} else {
    if ($sortOption != 'none' && $filterOption != 'none'){
        $data = fetchDataBySortFilter($con, $page, $itemsPerPage, $listSchedule, $sortOption, $catOption, $filterOption, $typeOption, $link);
        $totalPages = calculateTotalPagesByFilter($con, $itemsPerPage, $filterOption, $typeOption);
    }
    else if($sortOption != 'none'){
        $data = fetchDataByPageSort($con, $page, $itemsPerPage, $listSchedule, $sortOption, $catOption, $link);
        $totalPages = calculateTotalPagesBySort($con, $itemsPerPage, $sortOption, $catOption);
    } 
    else if ($filterOption != 'none'){
        $data = fetchDataByPageFilter($con, $page, $itemsPerPage, $listSchedule, $filterOption, $typeOption, $link);
        $totalPages = calculateTotalPagesByFilter($con, $itemsPerPage, $filterOption, $typeOption);
    }
    else {
        $data = fetchDataByPage($con, $page, $itemsPerPage, $listSchedule, $link);
        $totalPages = calculateTotalPages($con, $itemsPerPage);
    }
}

$response = array(
    'data' => $data,
    'totalPages' => $totalPages,
);

header('Content-Type: application/json');
echo json_encode($response);

?>