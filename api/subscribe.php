<?php
require_once '../app/core/db.php';
require_once '../app/models/user.php';
require_once '../app/core/cURL.php';
session_start();

$user = new User;
$apiURL = 'http://eatsnow-rest:8010/api/user/';

if(isset($_SESSION['email'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_SESSION['subs'] == 0) {
            subscribeAction($user, $apiURL);
        } else {
            unsubscribeAction($user, $apiURL);
        }
    } else {
        echo "<script type='text/javascript'> alert('Invalid Request!'); </script>";
    }
} else {
    echo "<script type='text/javascript'> alert('No user logged in!'); </script>";
}
echo "<script>location.href='/Profile'</script>";

/**
 * User subscribe action
 * @param User $user
 * @param string $apiURL
 */
function subscribeAction($user, $apiURL) {
    try {
        $data = array(
            'email' => $_SESSION['email'],
            'username' => $_SESSION['name'],
            'password' => $_SESSION['password'],
            'profile_img' => $_SESSION['profile_photo'],
        );
        
        $update = callAPI('POST', $apiURL, json_encode($data));
        switch ($update[1]) {
            case 201:
                echo "<script type='text/javascript'> alert('You have Subscribed!'); </script>";
                $user->updateUserSubs($_SESSION['email'], 1);
                $_SESSION['subs'] = 1;
                break;
            case 400:
                echo "<script type='text/javascript'> alert('Wrong format!'); </script>";
                break;
            case 500:
                echo "<script type='text/javascript'> alert('Internal Server Error!'); </script>";
                break;
            case 409:
                echo "<script type='text/javascript'> alert('Email already registered!'); </script>";
                break;
            default:
                echo "<script type='text/javascript'> alert('$update[1]'); </script>";
                break;
        }
    } catch (Exception $e) {
        echo "<script type='text/javascript'> alert('Subscribe Failed!'); </script>";
    }
}

/**
 * User Unsubscribe action
 * @param User $user
 * @param string $apiURL
 */
function unsubscribeAction($user, $apiURL) {
    try {
        $update = callAPI('DELETE', $apiURL . $_SESSION['email'], false);
        switch ($update[1]) {
            case 204:
                echo "<script type='text/javascript'> alert('You have Unsubscribed!'); </script>";
                $user->updateUserSubs($_SESSION['email'], 0);
                $_SESSION['subs'] = 0;
                break;
            case 500:
                echo "<script type='text/javascript'> alert('Internal Server Error!'); </script>";
                break;
            default:
                break;
        }
    } catch (Exception $e) {
        echo "<script type='text/javascript'> alert('Unsubcribe failed!'); </script>";
    }
}