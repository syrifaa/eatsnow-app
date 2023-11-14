<?php 
require_once '../app/core/db.php';
require_once '../app/models/user.php';
require_once '../app/core/cURL.php';
session_start();

$user = new User;
$APIURL = 'http://eatsnow-rest:8010/api/user/';

if(isset($_SESSION['email'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION['role'] == 0) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profile_img = setProfilePhoto();

        $data = array(
            'email' => $email,
            'username' => $name,
            'password' => $password,
            'profile_img' => $profile_img,
        );

        try {
            $requestToREST = true;
            if ($_SESSION['subs'] == 1) {
                $requestToREST = updateOnREST($APIURL, $data);
            } 

            if ($requestToREST) {
                $user->updateUser($_SESSION['email'], $name, $email, $password, $profile_img);
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['profile_photo'] = $profile_img;
                echo "<script type='text/javascript'> alert('Update Successful'); </script>";
            }
        } catch (Exception $e) {
            echo "<script type='text/javascript'> alert('Update Failed'); </script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Invalid Request!'); </script>";
    }
}
echo "<script>location.href='/Profile'</script>";

/**
 * Set profile photo
 * @return string
 */
function setProfilePhoto() {
    $profile_img = $_SESSION['profile_photo'];
    if (isset($_FILES['profile_photo'])) {
        $profile_img_tmp = $_FILES['profile_photo']['tmp_name'];
        if ($profile_img_tmp != "") {
            $profile_img = $_FILES['profile_photo']['name'];
            move_uploaded_file($profile_img_tmp, "../public/assets/img/$profile_img");
        }
    }
    return $profile_img;
}

/**
 * Update user on REST API
 * @param string $apiURL
 * @param array $data
 * @return bool true if success, false otherwise
 */
function updateOnREST($apiURL, $data) {
    try {
        $update = callAPI('PUT', $apiURL . $_SESSION['email'], json_encode($data));
        switch ($update[1]) {
            case 200:
                return true;
            case 400:
                echo "<script type='text/javascript'> alert('Wrong format!'); </script>";
                break;
            case 404:
                echo "<script type='text/javascript'> alert('User not found!'); </script>";
                break;
            case 500:
                echo "<script type='text/javascript'> alert('Internal Server Error!'); </script>";
                break;
            default:
                break;
        }
    } catch (Exception $e) {
        echo "<script type='text/javascript'> alert('Update Failed'); </script>";
    }
    return false;
}
?>