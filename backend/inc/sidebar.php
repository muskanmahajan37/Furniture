<?php
$path = '/flex-furniture/backend/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/admin.css">
</head>
<body>
<nav id="dashboard-sidebar">
    <h2 style="margin-left: 40px;color:#fff;margin-top: -10px;"></h2>
    <ul>
        <li><span>Navigation</span></li>
        <li><a href="<?php echo $path .'users.php';?>">Users</a></li>
        <li><a href="<?php echo $path .'products.php';?>">Products</a></li>
        <li><a href="<?php echo $path .'contacts.php';?>">Contacts</a></li>
        <li><a href="<?php echo $path .'admin_about.php';?>">About Us</a></li>
        <li><a href="<?php echo $path .'slider.php';?>">Slider</a></li>
        <li><a href="<?php echo $path .'categories.php';?>">Categories</a></li>
        <li><a href="<?php echo $path .'controllers/functions/logout.php';?>">Logout</a></li>
    </ul>
</nav>
</body>
</html>
