<?php
require './../../controllers/CategoryController.php';

$about = new CategoryController();

if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];
}

$about->destroy($categoryId);

header('Location: ./../../categories.php')

?>