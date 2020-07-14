<?php
require './../../controllers/ProductController.php';
require './../../controllers/CategoryController.php';

if (!isset($_SESSION)) {
    session_start();
}
$product = new ProductController;
$category = new CategoryController;

$categories = $category->all();
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
}

$currentProduct = $product->edit($productId);
if (isset($_POST['submitted'])) {
    $product->update($productId, $_SESSION['id'], $_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="../../../css/admin.css">
    <link rel="apple-touch-icon" sizes="57x57" href="../../images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../../images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../../images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../../images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../../images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/favicon-16x16.png">
    <link rel="manifest" href="../../images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../../images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<div class="dashboard-wrapper">
    <?php include '../../inc/sidebar.php' ?>
    <div id="dashboard-container">
        <div class="content-title">
            <h1 class="page-title"><a href="users.php">Admin Dashboard</a></h1>
        </div>
        <div class="main-content" style="margin-left:30px">
<form action="" method="POST" enctype="multipart/form-data">
    <div id="form-group" class="form-group">
        <label id="heading-contact-phone" class="contact-phone">Name:</label>
        <input id="inputButtons" type="text" value="<?php echo $currentProduct['product_name']; ?>" name="product_name">
    </div>
    <div class="form-group">
        <label id="title-contact-phone" class="contact-phone">Kodi:</label>
        <input id="inputButtons" type="text" value="<?php echo $currentProduct['product_code']; ?>" name="product_code">
    </div>
    <div class="form-group">
        <label id="title-contact-phone" class="contact-phone">Kategoria:</label>
        <select id="selectors" name="product_category" required>
            <option value="<?php echo $currentProduct['category_id'] ?>" selected hidden><?php echo $currentProduct['category_name'] ?></option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category["id"] ?>"><?php echo $category["name"] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label id="title-contact-phone" class="contact-phone">Çmimi:</label>
        <input required id="inputButtons" value="<?php echo $currentProduct['product_price'] ?>" type="text" name="product_price" style="position:relative;left:5px;">
    </div>
    <div class="form-group">
        <label id="title-contact-phone" class="contact-phone">Përshkrimi:</label>
        <input required id="inputButtons" value="<?php echo $currentProduct['product_description'] ?>" type="text" name="product_description" style="position:relative;left:5px;">
    </div>
    <div class="form-group">
        <label id="title-contact-phone" class="contact-phone">Sasia:</label>
        <input required id="inputButtons" value="<?php echo $currentProduct['product_quantity'] ?>" type="text" name="product_quantity" style="position:relative;left:5px;">
    </div>
    <div class="form-group">
        <div class="input-label"><label id="title-contact-phone" class="contact-phone">Foto:</label>
        </div>
        <input type="file" name="image">
    </div>
    <button type="submit" name="submitted" class="addButton">Update</button>
    <button type="button" onclick="window.location.href = '../../products.php';" class="cancelButton">Cancel</button>
</form>
        </div>

    </div>
</div>
</body>

</html>