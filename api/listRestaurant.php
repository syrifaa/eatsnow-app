<?php
require_once '../app/core/db.php';

$conn = new Database;
$sql = "SELECT * FROM restaurant";
$result = $conn->execute($sql);
$data = [];
while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}
header('Content-Type: application/json');
echo json_encode($data);
?>