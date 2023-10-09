<?php
// session_start();
if (isset($_SESSION['login'])) {
    echo "<script>location.href='/Home'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>Login - EatsNow</title>
        <link rel="stylesheet" href="../../../public/css/signupLogin.css">
        <link rel="icon" type="image/png" href="../../../public/assets/img/logo.png"/>
        <script src="../../../public/js/signupLogin.js"></script>

</head>
<body>
    <div class="signup">
        <h1>Login</h1>
        <form action="/api/login.php" method="POST">
            <table>
            <label>Email</label>
            <input type="email" id="email" name="email" onchange="cekEmail()" required>
            <p id="emailError"></p>
            <label>Password</label>
            <input type="password" id="password" name="password" onchange="cekPassword()" required>
            <p id="passwordError"></p>
            <input type="submit" id="submit-login" name="" value="Login">
            </table><br>
            <u>
                Don't Have Account? click <a href="/Register" class="here">here</a> for sign up
            </u>
        </form>
    </div>

    <a href="/Home" id="back-btn">
        <img src="../../../public/assets/img/back.png" alt="img">
    </a>
</body>
</html>