<?php 
session_start();
require_once '../app/core/db.php';
require_once '../app/models/user.php';

$user = new User;
$content = file_get_contents('php://input');
parse_str($content, $decoded);

if(isset($decoded['name']) && isset($decoded['email']) && isset($decoded['password'])){
    $name = $decoded['name'];
    $email = $decoded['email'];
    $password = $decoded['password'];

    $cek = $user->fetchAccount($email);
    $cekArray = mysqli_fetch_array($cek);
    
    if($cekArray==null){
        $user->createUser($name, $email, $password);
        echo "<script type='text/javascript'> alert('Register Successful'); </script>";
        echo "<script>location.href='/Login'</script>";
    }else{
        echo "<script type='text/javascript'> alert('Email already registered, Please use another email address'); </script>";
        echo "<script>location.href='.Register'</script>";
    }
}
?>
