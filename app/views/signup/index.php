<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>Sign Up  - EatsNow</title>
        <link rel="stylesheet" href="../../../public/css/signupLogin.css">
        <link rel="icon" type="image/png" href="../../../public/assets/img/logo.png"/>
        <script src="../../../public/js/signupLogin.js"></script>

</head>
<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <form action="/api/signup.php" method="POST">
            <table>
            <label>Username</label>
            <input type="text" id="name" name="name" onchange="cekUsername()" required>
            <p id="nameError"></p>
            <label>Email</label>
            <input type="email" id="email" name="email" onchange="cekEmail()" required>
            <p id="emailError"></p>
            <label>Password</label>
            <input type="password" id="password" name="password" onchange="cekPassword()" required>
            <p id="passwordError"></p>
            <input type="submit" id="submit" name="" value="Sign Up" href="">
            </table><br>
            <u>
                Already Have Account? click <a href="../login/index.php" class="here">here</a> for login
        </u>
        </form>
    </div>
    <a href="../home/index.php" id="back-btn">
        <img src="../../../public/assets/img/back.png" alt="img">
    </a>
</body>
</html>