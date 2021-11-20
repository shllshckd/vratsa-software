<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$message_id = $_GET['message_id'];
$datetime = date('Y-m-d H:i:s');

// get message, only one
$get_message_query = "SELECT * FROM recipes.recipes WHERE recipe_id = $message_id";
$result = mysqli_query($connection, $get_message_query);
$message = mysqli_fetch_assoc($result);

// m., m., m., m., m.date_created, c.recipe_category_id, c.recipe_category_name

?>

<div class="container fluid padding">
<h1>Update message with ID <?= $message['recipe_id'] ?></h1>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="name">Name: </label>
            <input id="name" type="text" name="name" value="<?= $message['recipe_name'] ?>" class="form-control">
        </div>
        <div>
            <label for="prep_description">Preparation Description: </label>
            <input id="prep_description" type="text" name="prep_description" value="<?= $message['prep_description'] ?>" class="form-control">
        </div>
        <div>
            <label for="prep_time">Preparation Time: </label>
            <input id="prep_time" type="text" name="prep_time" value="<?= $message['prep_time'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Choose Product Name</label>
            <select class="form-control" name="category_id">
                <option value="" selected="selected" disabled="disabled">- please choose a product -</option>
				<?php
				$recipe_categories = "SELECT recipe_category_id, recipe_category_name, date_created as category_date_created 
                                      FROM recipes.recipe_categories";
				$result_product = mysqli_query($connection, $recipe_categories);

				if (mysqli_num_rows($result_product) > 0) {
					while ($row = mysqli_fetch_assoc($result_product)) {
					    // if product_it from message is equal to product id from products
						if ($message['recipe_category_id'] == $row['recipe_category_id']) {
							echo "<option value=" . $row['recipe_category_id'] . " selected>" .
                                $row['recipe_category_name'] . " - " . $row['category_date_created'] . "</option>";
						}
						else {
							echo "<option value=" . $row['recipe_category_id'] . " >" .
                                $row['recipe_category_name'] . " - " . $row['category_date_created'] ."</option>";
						}
						//echo "<option value=" . $row['id'] . ">" . $row['product_name'] . " - " . $row['product_description']. "</option>";
					}
				} else {
					die('Query failed!' . mysqli_error($connection));
				}
				?>
            </select>
        </div>

        <input type="hidden" name="recipe_id" value="<?= $message['recipe_id'] ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>