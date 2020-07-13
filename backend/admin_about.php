<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION["is_superadmin"]) {
    header("Location: ../index.php");
}


require './controllers/AboutController.php';
$about = new AboutController();
$about_all = $about->all();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/admin.css">
    <script src="../javascript/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <th>Biography</th>
                    <th>Created_at</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($about_all as $about) : ?>
                    <tr>
                        <td><?php echo $about['id'] ?></td>
                        <td><?php echo $about['name'] ?></td>
                        <td><?php echo $about['biography'] ?></td>
                        <td><?php echo $about['created_at'] ?></td>
                        <td>
                            <a href="controllers/functions/edit-about.php?id=<?php echo $about['id'] ?>">Edit</a>
                        </td>
                        <td>
                            <a href="controllers/functions/delete-about.php?id=<?php echo $about['id'] ?>">Remove</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
</body>

</html>