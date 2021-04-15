<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

$category = "SELECT product_category_id, product_category_name FROM recipes.product_categories";
$result = mysqli_query($connection, $category);

?>
<h1>Add New Product</h1>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product_name">Enter Product Name</label>
        <input class="form-control" type="text" name="product_name" id="product_name">
    </div>
    <div class="form-group">
        <label for="product_price">Enter Product Price</label>
        <input class="form-control" type="text" name="product_price" id="product_price">
    </div>
    <div class="form-group">
        <label for="product_calories">Enter Product Calories</label>
        <input class="form-control" type="text" name="product_calories" id="product_calories">
    </div>
    <div class="form-group">
        <label>Choose Product Category Name</label>
        <select class="form-control" name="recipe_category_id">
            <option value="" selected="selected" disabled="disabled">- please choose a category -</option>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=" . $row['product_category_id'] . " >" .
                        $row['product_category_name'] . "</option>";
                }
            } else {
                die('Query failed!' . mysqli_error($connection));
            }
            ?>
        </select>
    </div>

    <button class="btn btn-success">Save</button>
</form>

<?php
if (isset($_POST['product_name'])) {
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_calories = $_POST['product_calories'];
	$recipe_category_id = $_POST['recipe_category_id'];

	$insert_query = "INSERT INTO recipes.`products`(`product_name`, `product_category_id`, `product_price`, `product_calories`) 
                     VALUES ('$product_name', $recipe_category_id, $product_price, $product_calories)";

	$result = mysqli_query($connection, $insert_query);

	if ($result) {
		echo "Recorded created successfully";
	} else {
		die('Query failed!' . mysqli_error($connection));
	}
}

include '../../includes/footer.php';
