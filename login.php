<?php
require './backend/controllers/AuthController.php';
if(!isset($_SESSION)){
    session_start();
}
$user = new AuthController;
if (isset($_POST['submitted'])) {
    $user->login($_POST);
}

if(isset($_SESSION["name"]) && isset($_SESSION["is_superadmin"])){
    header("Location:backend/users.php");
} else if(isset($_SESSION["name"])){
    header("Location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLEX - Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <script src="./scripts/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</head>

<body>
    <div class="login-hero">
        <div class="wp">
            <img src="https://secure.img1-ag.wfcdn.com/im/85067821/resize-h500-w500%5Ecompr-r85%5Etransparent/1148/114856311/default_name.png" alt="">
        </div>
        <div class="form-container">
            <h1 class="login-text">Login</h1>
            <form method="POST" class="form" id="login-form">
                <input type="email" id="email" name="email" placeholder="Email" data-validation="email">
                <br />
                <input type="password" id="password" name="password" placeholder="Password" data-validation="required">
                <p class="register-text">Don't have an acount? Sign up <a class="register-here-text" href="register.php">here</a>.</p>
                <br />
                <button type="submit" name="submitted" class="login-button">Log in</button>
                <br />
            </form>
        </div>
    </div>
</body>

<script>
    $.validate({
        borderColorOnError: '#fff'
    });
</script>

</html>