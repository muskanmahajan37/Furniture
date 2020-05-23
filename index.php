<?php
include './includes/header.php';
require './backend/controllers/UserController.php';
$user = new UserController;

?>
<h1 class="welcome">Welcome to Flex</h1>
<img src="https://secure.img1-ag.wfcdn.com/im/85067821/resize-h500-w500%5Ecompr-r85%5Etransparent/1148/114856311/default_name.png" alt="Comfortable chair" class="hero-chair">

<div id="scrollDown">
    <img src="./assets/arrow.png" class="arrow">
</div>
</div>

<div class="second">
    <p class="second-title">Some of our products</p>

    <div class="carousel-wrapper">
        <p class="carousel-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, neque vel.
            Commodi deleniti
            tenetur
            voluptates! Vero, sunt. Animi voluptatum quasi, reprehenderit veniam commodi odio dolorem, ipsam
            consequuntur, consequatur repudiandae aut. Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Omnis dolorem, quo maiores excepturi ratione ea perspiciatis recusandae earum, deserunt magnam
            tempora praesentium in amet, reprehenderit nemo totam laboriosam eveniet atque.</p>
        <div class="carousel">
            <img class="carousel-image" src="./assets/chair.png">
            <img class="carousel-image" src="./assets/chair2.jpg">
            <img class="carousel-image" src="./assets/chair3.jpg">
        </div>
    </div>
</div>
<?php include('./includes/footer.php'); ?>

</html>