<?php
    require './backend/controllers/UserController.php';

    $user = new UserController;

    if(isset($_POST['submitted'])) {
        $user->register($_POST);
    }
?>


<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLEX - Register</title>
    <link href="./css/register.css" media="all" rel="stylesheet" type="text/css"/>


</head>
​
<body>
    <div class="register-hero">
​
        <div class="form-container">
            <h1 class="register-text">Register</h1>
            <form method="POST" class="form">
                <input class="my-input" type="name" name="name" id="name" placeholder="Full name" required>
                <br />
                <input class="my-input" type="email" name="email" id="email" placeholder="Email" required>
                <br />
                <input class="my-input" type="password" name="password" id="password" placeholder="Password" required>
                <br />
                <input class="my-input" type="password" name="confirmpassword" id="confirmpassword"
                    placeholder="Confirm Password" required>
                <br />
                <label class="gender-radio" for="male"><input type="radio" id="male" name="gender"
                        value="male">Male &nbsp;&nbsp;</label><br />
                <label class="gender-radio" for="female"><input type="radio" id="female" name="gender"
                        value="male">Female</label>
                <br />
                <input class="my-input" type="Date" name="date_of_birth" id="date_of_birth" required>
                <br />
                
                <div class="city-wrapper">
                    <label for="city" class="city-label">City</label><br />
                    <select id="city" name="city">
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
            </form>
        </div>
​
        <div class="wp">
            <img src="https://secure.img1-ag.wfcdn.com/im/85067821/resize-h500-w500%5Ecompr-r85%5Etransparent/1148/114856311/default_name.png"
                alt="Chair">
        </div>
​
    </div>
</body>
​
</html>