<?php
require "./backend/controllers/ProductController.php";
$product = new ProductController;
$produktet = $product->all();
?>
<html>
<body>
<?php foreach($produktet as $p):?>
<!--    <img src="uploads/--><?php //echo $p['image']?><!--" alt="" style="height: 30px;width: 30px">-->
<h1><?php echo $p["name"]?></h1><br>
<h1><?php echo $p["price"]?></h1><br>
<h1><?php echo $p["username"]?></h1><br>
<h1><?php echo $p["category"]?></h1><br>
<hr>
<?php endforeach;?>
</body>
</html>