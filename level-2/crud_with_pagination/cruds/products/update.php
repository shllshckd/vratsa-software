<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

$product_id = $_GET['id'];
$read_query = "SELECT recipes.products.`product_id`, recipes.products.`product_name`, 
                      recipes.products.`product_price`, recipes.products.`product_calories` ,
                      recipes.products.product_category_id as pcid
               FROM recipes.`products` WHERE `product_id`= $product_id LIMIT 1";

$result = mysqli_query($connection, $read_query);

if ($result) {
	$row = mysqli_fetch_assoc($result);
}

?>
    <h1>Edit Product</h1>
    <form method="post" action="">
        <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
        <div class="form-group">
            <label>Enter Product Name</label>
            <input class="form-control" type="text" name="product_name" value="<?= $row['product_name'] ?>">
        </div>
        <div class="form-group">
            <label>Enter Product Price</label>
            <input class="form-control" type="text" name="product_price" value="<?= $row['product_price'] ?>">
        </div>
        <div class="form-group">
            <label>Enter Product Calories</label>
            <input class="form-control" type="text" name="product_calories" value="<?= $row['product_calories'] ?>">
        </div>
        <div class="form-group">
            <label>Choose Product Category Name</label>
            <select class="form-control" name="product_category_id">
                <option value="" selected="selected" disabled="disabled">- please choose a category -</option>
				<?php
				$category = "SELECT product_category_id, product_category_name FROM recipes.product_categories";
				$result_from_query = mysqli_query($connection, $category);

				if (mysqli_num_rows($result_from_query) > 0) {
					while ($row_inside = mysqli_fetch_assoc($result_from_query)) {

					    if ($row_inside['product_category_id'] == $row['pcid']) {
							echo "<option value=" . $row_inside['product_category_id'] . " selected>" . $row_inside['product_category_name'] . "</option>";
						}
					    else {
							echo "<option value=" . $row_inside['product_category_id'] . " >" . $row_inside['product_category_name'] . "</option>";
						}

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
if (!empty($_POST)) {
	$product_id = $_POST['product_id'];
	$product_name = $_POST['product_name'];
	$product_calories = $_POST['product_calories'];
	$product_price = $_POST['product_price'];
	$product_category_id = $_POST['product_category_id'];

	$update_query = "UPDATE recipes.`products` 
                     SET `product_name` = '$product_name', 
                         `product_category_id` = '$product_category_id', 
                         `product_price` = $product_price,
                         `product_calories` = $product_calories 
                    WHERE product_id = $product_id";

	// var_dump($update_query);
	// die;
	$update_res = mysqli_query($connection, $update_query);

	if (!$update_res) {
		die('Update failed!' . mysqli_error($connection));
	} else {
		header("Location: index.php");
		echo "Update successful!";
	}
}

include '../../includes/footer.php';
