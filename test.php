<?php
require "./backend/controllers/ProductController.php";
$product = new ProductController;
$produktet = $product->all();
?>
<html>
<body>
<?php foreach($produktet as $p):?>
    <img src="uploads/<?php echo $p['image']?>" alt="" style="height: 30px;width: 30px">
<?php endforeach;?>
</body>
</html>