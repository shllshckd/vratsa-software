<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

?>

<div class="container fluid padding">
<h1>Add message</h1>
    <form action="" method="post" accept-charset="utf-8">
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form-control">
        </div>
        <div>
            <label for="prep_description">Preparation Description</label>
            <input id="prep_description" type="text" name="prep_description" class="form-control">
        </div>
        <div>
            <label for="prep_time">Preparation Time</label>
            <input id="prep_time" type="text" name="prep_time" class="form-control">
        </div>
        <div class="form-group">
            <label>Choose Category Name</label>
            <select class="form-control" name="category_id">
                <option selected="selected" disabled="disabled">- please choose a category -</option>
				<?php
				// m.recipe_id, m.recipe_name, m.prep_description, m.prep_time, m.date_created, c.recipe_category_id, c.recipe_category_name

				$product = "SELECT recipe_category_id, recipe_category_name, date_created FROM recipes.recipe_categories";
				$result = mysqli_query($connection, $product);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value=" . $row['recipe_category_id'] . ">" . $row['recipe_category_name'] . " - " . $row['date_created']. "</option>";
					}
				} else {
					die('Query failed!' . mysqli_error($connection));
				}
				?>
            </select>
        </div>

        <input type="submit" name="submit" value="Save" class="btn btn-success">
        <a href="index.php" class="btn btn-outline-dark">Go to home page</a>
    </form>

<?php


if (isset($_POST['name']) && isset($_POST['prep_description']) &&
    isset($_POST['prep_time']) && isset($_POST['category_id'])) {

	$name = $_POST['name'];
	$prep_time = $_POST['prep_time'];
	$prep_description = $_POST['prep_description'];
	$category_id = $_POST['category_id'];
	$date = date('Y-m-d H:i:s');

	$insert_query = "INSERT INTO recipes.recipes (recipe_name, prep_description, prep_time, recipe_category_id, date_created)  
    VALUES ('$name','$prep_description', $prep_time, '$category_id', '$date')";

	$result = mysqli_query($connection, $insert_query);
	if ($result) {
		echo "Successfully created record.";
	}
	else {
		exit('Insert query failed. Error: ' . mysqli_error($connection));
	}
}

echo "</div>";

include ('partials/footer.php');
