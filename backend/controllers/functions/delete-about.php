<?php
require './../../controllers/AboutController.php';

$about = new AboutController();

if(isset($_GET['id'])) {
    $aboutId = $_GET['id'];
}

$about->destroy($aboutId);

header('Location: ./../../contacts.php')

?>