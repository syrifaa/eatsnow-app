<?php
include_once '../app/views/restaurantPage/reviewCard.php';
include_once '../app/core/cURL.php';

$restoID = $_GET['restoID'];

function fetchReview($restoID){
    $url = "http://soap:8020/ws/review";

    $request = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:web="http://services.eatsnowsoap.com/">
       <soapenv:Header/>
       <soapenv:Body>
          <web:getReview>
             <arg0>' . $restoID . '</arg0>
          </web:getReview>
       </soapenv:Body>';
    
    $headers = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        'Content-Length: ' .strlen($request),
        'X-API-KEY: eatsnow-app-service',
    );
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    $response = curl_exec($ch);
    
    $response_clean1 = str_replace('<?xml version=\'1.0\' encoding=\'UTF-8\'?><S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/"><S:Body><ns2:getReviewResponse xmlns:ns2="http://services.eatsnowsoap.com/"><return>', '', $response);
    $response_clean2 = str_replace('</return></ns2:getReviewResponse></S:Body></S:Envelope>', '', $response_clean1);
    
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }
    
    curl_close($ch);
    
    $data = json_decode($response_clean2, true);
    
    if ($data == null) {
        return "error";
    } else {
        foreach ($data['hasil'] as $review) {
            $reviewCard = generateReviewCard(
                $review['profile_img'],
                $review['name_user'],
                $review['rating'],
                $review['content'],
            );
            $cards[] = $reviewCard;
        }
        return $cards;
    }
}

$cardData = fetchReview($restoID);
$response = array(
    'data' => $cardData,
);

header('Content-Type: application/json');
echo json_encode($response);
?>