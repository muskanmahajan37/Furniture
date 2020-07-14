<?php
if (!isset($_SESSION)) {
    session_start();
}
include './includes/header.php';
require './backend/controllers/ProductController.php';
echo '<link href="./css/product.css" rel="stylesheet">';
$product = new ProductController;
$data = $product->all();

?>
<h1 class="welcome">Products</h1>
<div class="row">
    <?php foreach ($data as $p) : ?>

        <div class="column">
            <img src="uploads/<?php echo $p['image'] ?>" alt="<?php $p['name'] ?>" class="product-image">
            <h2 class="product-text"><?php echo $p['name'] ?></h2>
            <p class="product-text"><?php echo $p['category'] ?></p>
            <p class="product-text"><?php echo $p['username'] ?></p>
            <p class="product-text"><?php echo '$' . $p['price'] ?></p>
        </div>

    <?php endforeach; ?>
</div>

<?php include('./includes/footer.php'); ?>

