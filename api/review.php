<?php
include_once '../app/views/restaurantPage/reviewCard.php';

$review = new SimpleXMLElement($namaXMLnya);
$restoID = $_GET['restoID'];

function fetchReview($review, $restoID){
    foreach ($review->id as $reviewID) {
        // just echo $id-restaurant = $restoID
        if ($reviewID->id_restaurant == $restoID) {
            $reviewCard = generateReviewCard(
                $reviewID->profile_img,
                $reviewID->name_user,
                $reviewID->rating,
                $reviewID->content,
            );
            $cards[] = $reviewCard;
        }
    }
    return $cards;
}

$data = fetchReview($review, $restoID);
$response = array(
    'data' => $data,
);

header('Content-Type: application/json');
echo json_encode($response);
?>


