<?php
require './../../controllers/ContactController.php';

$contact = new ContactController;

if (isset($_GET['id'])) {
    $contactId = $_GET['id'];
}

$contact->destroy($contactId);

header('Location: ./../../contacts.php')

?>