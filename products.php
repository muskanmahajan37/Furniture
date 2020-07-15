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
<h1 class="welcome">Our Products </h1>

<div class="row">
    <?php foreach ($data as $p) : ?>
        <div class="column">
            <div class="prod-image">
                <img src="uploads/<?php echo $p['image'] ?>" alt="<?php $p['name'] ?>" class="product-image">
            </div>
            <div class="product-details">
                <h3 class="product-text" id="product-name"><?php echo $p['name'] ?></h3>
                <p class="product-text" id="product-category"><?php echo $p['category'] ?></p>
                <p class="product-text" id="product-owner"><?php echo $p['username'] ?></p>
                <div class="price">
                    <div class="product-price-div">
                        <p class="product-text" id="product-price"><?php echo '$' . $p['price'] ?></p>
                    </div>
                    <div class="starstyle">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>

<?php include('./includes/footer.php'); ?>

