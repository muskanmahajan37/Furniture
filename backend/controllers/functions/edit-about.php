<?php

require './../../controllers/AboutController.php';

$about = new AboutController();
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET['id'])) {
    $aboutId = $_GET['id'];
}
$currentAbout = $about->getAboutById($aboutId);
if (isset($_POST['submitted'])) {
    $about->update($aboutId, $_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../../../css/admin.css">
    <script src="../javascript/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" sizes="57x57" href="../images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
    <link rel="manifest" href="../images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<div class="dashboard-wrapper">
    <?php include '../../inc/sidebar.php' ?>
    <div id="dashboard-container">
        <div class="content-title">
            <h1 class="page-title"><a href="#">Admin Dashboard</a></h1>
        </div>
        <div class="main-content-edit" style="margin-left:30px">
            <form action="" method="POST">
                <div id="contact-form-group" class="form-group">
                    <div class="input-label">
                        <label id="heading-contact-phone" class="contact-phone">Name:</label>
                    </div>
                    <input id="inputButtons" value="<?php echo $currentAbout['name']; ?>"
                           type="text" name="name" style="position:relative;left:5px;" required>
                </div>
                <div id="contact-form-group" class="form-group">
                    <div class="input-label">
                        <label id="heading-contact-phone" class="contact-phone">Biography:</label>
                    </div>
                    <textarea cols="143" rows="20" name="biography">
                        <?php echo $currentAbout['biography']; ?>
                    </textarea>
                    <div style="margin-top:20px;margin-right: 1000px;">
                        <button type="submit" name="submitted" class="addButton">Update</button>
                        <button type="button" class="cancelButton">Close</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
