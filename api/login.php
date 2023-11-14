<?php 
if(!session_id()) { session_start(); }
require_once '../app/core/db.php';
require_once '../app/models/user.php';

$user = new User;
$content = file_get_contents('php://input');
parse_str($content, $decoded);

$email = $decoded['email'];
$password = $decoded['password'];

$row = $user->fetchAccount($email);
$dataUser = mysqli_fetch_array($row);

if(isset($decoded['email']) && isset($decoded['password'])){
    if($dataUser['email'] == $email && $dataUser['password'] == $password){
        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $dataUser['user_name'];
        $_SESSION['password'] = $dataUser['password'];
        $_SESSION['role'] = $dataUser['isAdmin'];
        $_SESSION['profile_photo'] = $dataUser['profile_img'];
        $_SESSION['subs'] = $dataUser['isSubs'];
        echo "<script type='text/javascript'> alert('Login Successful'); </script>";

        if($dataUser['isAdmin'] == 0){
            echo "<script>location.href='/Home'</script>";
        }
        else{
            echo "<script>location.href='/Update'</script>";
        }
    }else{
        echo "<script type='text/javascript'> alert('Email or Password is wrong'); </script>";
        echo "<script>location.href='/Login'</script>";
    }
}
else{
    echo "<script type='text/javascript'> alert('Email or Password is wrong'); </script>";
    echo "<script>location.href='/Login'</script>";
}
?>