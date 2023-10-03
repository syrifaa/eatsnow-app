<?php 
session_start();
require_once '../app/core/db.php';
require_once '../app/user.php';

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
        $_SESSION['name'] = $dataUser['name'];
        $_SESSION['password'] = $dataUser['password'];
        $_SESSION['role'] = $dataUser['role'];
        echo "<script type='text/javascript'> alert('Login Successful'); </script>";

        if($dataUser['role'] == 'user'){
            echo "<script>location.href='../app/views/home/index.php'</script>";
        }
    }else{
        echo "<script type='text/javascript'> alert('Email or Password is wrong'); </script>";
        echo "<script>location.href='../app/views/login/index.php'</script>";
    }
}
else{
    echo "<script type='text/javascript'> alert('Email or Password is wrong'); </script>";
    echo "<script>location.href='../app/views/login/index.php'</script>";
}
?>