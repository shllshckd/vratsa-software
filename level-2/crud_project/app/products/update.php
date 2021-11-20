<?php

/**
 * @var object $connection
 */
include('../../partials/connection.php');
include('../../partials/header.php');

$id = $_GET['id'];
$read_query = "SELECT * FROM recipes.products WHERE `products`.`product_id` = '$id' LIMIT 1";

$result = mysqli_query($connection, $read_query);

if ($result) {
	$row = mysqli_fetch_assoc($result);
}

?>

<form action="" method="post">
    <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">

    <label>
		Enter Product Name
		<input type="text" class="form-control" name="product_name" value="<?= $row['product_name']?>">
	</label>
    <br>
    <label>
		Enter Product Price
		<input type="text" class="form-control" name="product_price" value="<?= $row['product_price']?>">
	</label>
    <br>
	<label>
		Enter Product Calories
		<input type="text" class="form-control" name="product_calories" value="<?= $row['product_calories']?>">
	</label>

    <br>
    <button class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-outline-dark">Go to index</a>
</form>
<?php

if (!empty($_POST)) {
	$product_id = $_POST['product_id'];
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_calories = $_POST['product_calories'];

	$update_query = "UPDATE `recipes`.`products` 
                 SET `product_name` = '$product_name', 
                     `product_price` = $product_price,
                     `product_calories` = $product_calories
				 WHERE `product_id` = $product_id";

	$result = mysqli_query($connection, $update_query);

	if ($result) {
		header('Location: index.php');
	}
	else {
		exit('Operation failed. Error: ' . mysqli_error($connection));
	}
}
