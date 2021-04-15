<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

// get all categories
$category = "SELECT recipe_category_id, recipe_category_name FROM recipes.recipe_categories";
$result_category = mysqli_query($connection, $category);

// get all products
$products = "SELECT product_id, product_name FROM recipes.products WHERE date_deleted IS NULL";
$result_products = mysqli_query($connection, $products);

?>

<h1>Add New Recipe</h1>
<form method="post" action="">
    <div class="form-group">
        <label for="recipe_name">Enter Recipe Name</label>
        <input class="form-control" type="text" name="recipe_name" id="recipe_name">
    </div>
    <div class="form-group">
        <label for="prep_description">Enter Recipe Description</label>
        <input class="form-control" type="text" name="prep_description" id="prep_description">
    </div>
    <div class="form-group">
        <label for="prep_time">Enter Prep Time</label>
        <input class="form-control" type="text" name="prep_time" id="prep_time">
    </div>
    <div class="form-group">
        <label for="recipe_category_id">Choose Product Category Name</label>
        <select class="form-control" name="recipe_category_id" id="recipe_category_id">
            <option value="" selected="selected" disabled="disabled">Please Choose A Category</option>
            <?php
            // if any categories, print them - ready to be selected
            // we can select only one of these
            if (mysqli_num_rows($result_category) > 0) {
                while ($row = mysqli_fetch_assoc($result_category)) {
                    echo "<option value=" . $row['recipe_category_id'] . " selected>" . $row['recipe_category_name'] . "</option>";
                }
            } else {
                die('Query failed!' . mysqli_error($connection));
            }
            ?>
        </select>
    </div>

    <!-- Multiple Products Selector -->
    <h4>Please choose products and quantity. Leave blank quantity where the product doesn't exist.</h4>
    <?php
	// if any products, print multiple input fields for them
	if (mysqli_num_rows($result_products) > 0) {
        while ($row = mysqli_fetch_assoc($result_products)) {
            echo "<div class='form-group'>";
            echo "<label>" . $row['product_name'] . " количество:</label>";
            echo "<input class='form-control' name='products_quantity[\"" . $row['product_id'] . "\"]'></div>";
        }
    }
    ?>
    <button class="btn btn-success">Submit</button>
</form>

<?php

$current_date = date('Y-m-d');

if (isset($_POST['recipe_name'])) {
	$recipe_name = $_POST['recipe_name'];
	$prep_description = $_POST['prep_description'];
	$prep_time = $_POST['prep_time'];
	$recipe_category_id = $_POST['recipe_category_id'];

	// insert into recipes query
	$insert_query = "INSERT INTO recipes.`recipes` (`recipe_name`, `prep_description`, `prep_time`,`date_created`,`recipe_category_id`) 
                     VALUES ('$recipe_name', '$prep_description', $prep_time, '$current_date', '$recipe_category_id')";
	// var_dump( $insert_query );
	$result = mysqli_query($connection, $insert_query);

	if ($result) {
		echo "Record created successfully.";


//		// get id of last thing (recipe) that was put in db
//		$new_recipe_id = mysqli_insert_id($connection);
//
//		// if we want to insert products
//        // for each product we want to be inserted, insert it into recipes products
//		if (!empty($_POST['products_quantity'])) {
//
//		    // iterate products quantities collection - product id => quantity of that product (from input)
//			foreach ($_POST['products_quantity'] as $key => $value) {
//				if (!empty($value) && $value > 0) {
//					$insert_product_query = "INSERT INTO recipes.recipes_products (recipe_id, product_id, product_quantity)
//                                             VALUES ($new_recipe_id, $key, $value)";
//					$result_product = mysqli_query($connection, $insert_product_query);
//				}
//			}
//		}
	} else {
		die('Query failed. ' . mysqli_error($connection));
	}
}

include '../../includes/footer.php';
