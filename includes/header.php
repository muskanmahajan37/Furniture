<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLEX Furniture</title>
    <script src="/scripts/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>
    <div class="wrapper">
            <nav>
                <ul>
                    <a href="index.php"><li>Home</li></a>
                    <a href="products.php"><li>Products</li></a>
                    <a href="about.php"><li>About us</li></a>
                    <a href="contact.php"><li>Contact</li></a>
                    <?php if(isset($_SESSION["name"])):?>
                    <a href="backend/controllers/functions/logout.php">LOGOUT</a>
                    <?php else:?>
                    <a href="login.php"><li>Log in</li></a>
                    <?php endif?>
                </ul>
            </nav>
