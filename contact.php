<?php
include './includes/header.php';
require './backend/controllers/ContactController.php';
echo '<link href="./css/contact.css" rel="stylesheet">';

$contact = new ContactController;
if (isset($_POST['submitted'])) {
    $contact->store($_POST);
}
?>

<div class="contact-container">
    <div class="form-area">
        <div class="left-area">
            <h1>FLEX</h1>
        </div>
        <div class="right-text">
            <h2>Contact Us</h2>
            <p>Feel Free to contact us if you have any questions about the service you have already taken or going to take any of our services.</p>
            <form name="contact" id="contact" onsubmit="return validateFormOnSubmit(this)" method="POST">
                <input type="text" name="name" data-validation="required" placeholder="Enter name" class="contact-input">
                <div id="name-error" class="error"></div>
                <input type="email" name="email" placeholder="Enter email" class="contact-input">
                <div id="email-error" class="error"></div>
                <textarea cols="30" rows="5" name="message" placeholder="Enter message" class="contact-input-message"></textarea>
                <div id="message-error" class="error"></div>
                <button class="contact-btn" name="submitted" type="submit">Send</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>

<?php include('./includes/footer.php'); ?>

<script>
    function validateFormOnSubmit(contact) {
        reason = "";
        reason += validateName(contact.name);
        reason += validateEmail(contact.email);
        reason += validateMessage(contact.message);

        if (reason.length > 0) {
            return false;
        } else {
            return true;
        }
    }

    function validateName(name) {
        var error = "";

        if (name.value.length == 0) {
            name.style.background = '#ff9a9a';
            document.getElementById('name-error').innerHTML = "The required field has not been filled in";
            var error = "1";
        } else {
            name.style.background = 'White';
            document.getElementById('name-error').innerHTML = '';
        }
        return error;
    }


    function validateMessage(name) {
        var error = "";

        if (name.value.length == 0) {
            name.style.background = '#ff9a9a';
            document.getElementById('message-error').innerHTML = "The required field has not been filled in";
            var error = "1";
        } else {
            name.style.background = 'White';
            document.getElementById('message-error').innerHTML = '';
        }
        return error;
    }

    function validateEmail(email) {
        var error = "";
        var temail = trim(email.value); // value of field with whitespace trimmed off
        var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
        var illegalChars = /[\(\)\<\>\,\;\:\\\"\[\]]/;

        if (email.value == "") {
            email.style.background = '#ff9a9a';
            document.getElementById('email-error').innerHTML = "Please enter an email address.";
            var error = "2";
        } else if (!emailFilter.test(temail)) { //test email for illegal characters
            email.style.background = 'Red';
            document.getElementById('email-error').innerHTML = "Please enter a valid email address.";
            var error = "3";
        } else if (email.value.match(illegalChars)) {
            email.style.background = 'Red';
            var error = "4";
            document.getElementById('email-error').innerHTML = "Email contains invalid characters.";
        } else {
            email.style.background = 'White';
            document.getElementById('email-error').innerHTML = '';
        }
        return error;
    }

    function trim(s) {
        return s.replace(/^\s+|\s+$/, '');
    }
</script>

</html>