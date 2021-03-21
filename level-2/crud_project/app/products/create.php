<?php
/**
 * @var object $connection
 */
include('../../partials/header.php');

?>

<h1>Add New Product</h1>
<form method="post" action="">
    <div class="form-group">
	    <label for="product_name">Product Name</label>
        <input class="form-control" type="text" name="product_name" id="product_name">
    </div>

    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input class="form-control" type="text" name="product_price" id="product_price">
    </div>

    <div class="form-group">
        <label for="product_calories">Product Calories</label>
        <input class="form-control" type="text" name="product_calories" id="product_calories">
    </div>
    <button type="submit" name="submit" value="Save" class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-outline-dark">Go to index</a>
</form>

<?php

if (isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_calories'])) {
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_calories = $_POST['product_calories'];

	$insert_query = "INSERT INTO `recipes`.`products` (`product_name`, `product_price`, `product_calories`) 
				     VALUES ('$product_name', $product_price, $product_calories)";

    $result = mysqli_query($connection, $insert_query);
}

include ('../../partials/footer.php');
