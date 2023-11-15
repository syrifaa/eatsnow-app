<?php

// function to call api
function callAPI($method, $url, $data)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => $method,
    ));
    switch ($method) {
        case "POST":
            curlSetPostFields($data, $curl);
            break;

        case "PUT":
            curlSetPostFields($data, $curl);
            break;

        default:
            if ($data) {
                $url = sprintf("%s?%s", $url, http_build_query($data));
            }
    }

    // EXECUTE:
    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        echo "Error: " . curl_error($curl);
    }

    // GET RESULT
    $result = json_decode($response);
    $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return [$result, $response_code];
}

function curlSetPostFields($postData, $curl) {
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));
}

?>
