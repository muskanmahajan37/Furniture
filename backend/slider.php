<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION["is_superadmin"]) {
    header("Location: ../index.php");
}
require './controllers/SliderController.php';
$slider = new SliderController();
$sliders = $slider->all();

if (isset($_POST['submitted'])) {
    $slider->store($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/admin.css">
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
    <?php include 'inc/sidebar.php' ?>
    <div id="dashboard-container">
        <div class="content-title">
            <h1 class="page-title"><a href="users.php">Admin Dashboard</a></h1>
        </div>
        <div class="main-content">
            <table class="table">
                <tr class="table-head">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Created_at</th>
                    <th></th>
                    <th>
                        <button id="myBtn" class="button1">ADD SLIDER</button>
                    </th>
                </tr>
                <?php foreach ($sliders as $slider) : ?>
                    <tr>
                        <td><?php echo $slider['id'] ?></td>
                        <td><?php echo $slider['name'] ?></td>
                        <td><?php echo $slider['image'] ?></td>
                        <td><?php echo $slider['created_at'] ?></td>
                        <td><a href="controllers/functions/delete-slider.php?id=<?php echo $slider["id"] ?>">Remove</a>
                        </td>
                        <td><a href="controllers/functions/edit-slider.php?id=<?php echo $slider["id"] ?>">Edit</a></td>

                    </tr>
                <?php endforeach ?>
            </table>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div id="contact-form-group" class="form-group">
                            <div class="input-label">
                                <label id="heading-contact-phone" class="contact-phone">Name:</label>
                            </div>
                            <input id="inputButtons" type="text" name="name" style="position:relative;left:5px;"
                                   required>
                        </div>
                        <div class="form-group">
                            <div class="input-label"><label id="title-contact-phone" class="contact-phone">Foto:</label>
                            </div>
                            <input type="file" name="image">
                        </div>
                        <button type="submit" name="submitted" class="addButton">Create</button>
                        <button type="button" class="cancelButton">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("cancelButton")[0];
    btn.onclick = function () {
        modal.style.display = "block";
    }
    span.onclick = function () {
        modal.style.display = "none";
    }
</script>
</body>
</html>
