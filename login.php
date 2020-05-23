<?php
    require './backend/controllers/AuthController.php';

    $user = new AuthController;

    if(isset($_POST['submitted'])) {
        $user->login($_POST);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLEX - Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="login-hero">
        <div class="wp">
            <img src="https://secure.img1-ag.wfcdn.com/im/85067821/resize-h500-w500%5Ecompr-r85%5Etransparent/1148/114856311/default_name.png"
                alt="">
        </div>
        <div class="form-container">
            <h1 class="login-text">Login</h1>
            <form method="POST"  class="form">
                <input type="email" id="email" name="email" placeholder="Email" required>
                <br />
                <input type="password" id="password" name="password" placeholder="Password" required>
                <p class="register-text">Don't have an acount? Sign up <a class="register-here-text" href="register.php">here</a>.</p>
                <br />
                <button type="submit" name="submitted" class="login-button">Log in</button>
            </form>
        </div>
    </div>
</body>

</html>