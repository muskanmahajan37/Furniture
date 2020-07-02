<?php
if(!isset($_SESSION)){
    session_start();
}
require './backend/controllers/UserController.php';
$user = new UserController;
if (isset($_POST['submitted'])) {
    $user->register($_POST);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLEX - Register</title>
    <link href="./css/register.css" media="all" rel="stylesheet" type="text/css" />
    <script src="./scripts/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</head>
<body>
    <div class="register-hero">
        <div class="form-container">
            <h1 class="register-text">Register</h1>
            <form method="POST" class="form">
                <input class="my-input" type="name" name="name" id="name" placeholder="Full name" data-validation="required">
                <br />
                <input class="my-input" type="email" name="email" id="email" placeholder="Email" data-validation="email">
                <br />
                <input class="my-input" type="password" name="password" id="password" placeholder="Password" data-validation="required">
                <br />
                <input class="my-input" type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" data-validation="required">
                <br />
                <label class="gender-radio" for="male"><input type="radio" id="male" name="gender" value="male">Male &nbsp;&nbsp;</label><br />
                <label class="gender-radio" for="female"><input type="radio" id="female" name="gender" value="male">Female</label>
                <br />
                <div class="city-wrapper">
                    <label for="city" class="city-label">City</label><br />
                    <select id="city" name="city" data-validation="required">
                        <option value="Prishtinë">Prishtinë</option>
                        <option value="Prizren">Prizren</option>
                        <option value="Gjakove">Gjakove</option>
                        <option value="Gjilan">Gjilan</option>
                        <option value="Ferizaj">Ferizaj</option>
                        <option value="Pejë">Pejë</option>
                        <option value="Mitrovicë">Mitrovicë</option>
                    </select>
                </div>
                <br />
                <button type="submit" name="submitted" class="register-button">Register</button>
                <br />
            </form>
        </div>
        ​
        <div class="wp">
            <img src="https://secure.img1-ag.wfcdn.com/im/85067821/resize-h500-w500%5Ecompr-r85%5Etransparent/1148/114856311/default_name.png" alt="Chair">
        </div>
        ​
    </div>
</body>
​
<script>
    $.validate({
        borderColorOnError: '#fff'
    });
</script>

</html>