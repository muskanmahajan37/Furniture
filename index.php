<?php
if (!isset($_SESSION)) {
    session_start();
}
include './includes/header.php';
require './backend/controllers/UserController.php';
$user = new UserController;

?>
<div class="main-menu-hero">
    <h1 class="welcome">Welcome to Flex</h1>
    <img src="https://secure.img1-ag.wfcdn.com/im/85067821/resize-h500-w500%5Ecompr-r85%5Etransparent/1148/114856311/default_name.png" alt="Comfortable chair" class="hero-chair">

    <div id="scrollDown">
        <img src="./assets/arrow.png" class="arrow">
    </div>
</div>

<div class="second">
    <p class="second-title">Some of our products</p>

    <div class="carousel-wrapper">
        <p class="carousel-text">Here at Home Furniture by Flex.com we know how difficult it can be when purchasing online, that's why our company gives maximum priority to customer satisfaction. Our highly trained staff is ready to assist you with any questions regarding your purchases. You can be assured that our customers are our main concern when it comes to consumer happiness. When you shop at Flex.com you can shop with great confidence that you the customer will always be treated with the utmost care and respect. Our goal is to provide you with a wonderful experience and keep you coming back for your future furniture purchases.
            <br />
            <br />
            <br />
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas neque earum sit. Nostrum quam laudantium, culpa at unde voluptates eos quae ex temporibus itaque officia nobis cupiditate ullam. Est, veniam?
        </p>
        <div class="carousel">
            <img class="carousel-image" src="./assets/s1.jpg">
            <img class="carousel-image" src="./assets/s2.jpg">
            <img class="carousel-image" src="./assets/s3.jpg">
        </div>
    </div>
</div>
<?php include('./includes/footer.php'); ?>

</html>