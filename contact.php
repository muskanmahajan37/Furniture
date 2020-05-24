<?php
include './includes/header.php';
require './backend/controllers/UserController.php';
$user = new UserController;
echo '<link href="./css/contact.css" rel="stylesheet">';

?>

<div class="contact-container">
    <div class="form-area">
        <div class="left-area">
            <h1>FLEX</h1>
        </div>
        <div class="right-text">
            <h2>Contact Us</h2>
            <p>Feel Free to contact us if you have any questions about the service you have already taken or going to take any of our services.</p>
            <input type="text" placeholder="Enter name" class="contact-input">
            <input type="text" placeholder="Enter email" class="contact-input">
            <textarea cols="30" rows="5" placeholder="Enter message" class="contact-input-message"></textarea>
            <button class="contact-btn" type="submit">Send</button>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php include('./includes/footer.php'); ?>

</html>