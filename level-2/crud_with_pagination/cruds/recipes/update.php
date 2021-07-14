<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

$recipe_id = $_GET['id'];
$read_query = "SELECT `recipe_id`, `recipe_name` ,`prep_description`,`prep_time`,
                      `recipe_category_id` as rcid,`date_created`, `date_deleted` 
               FROM recipes.recipes WHERE recipe_id = $recipe_id";

$result = mysqli_query($connection, $read_query);

if ($result) {
	$row = mysqli_fetch_assoc($result);
}

?>
    <h1>Update Recipe</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="recipe_name">Enter Recipe Name</label>
            <input type="text" name="recipe_name" id="recipe_name" class="form-control" value="<?= $row['recipe_name'] ?>">
        </div>
        <div class="form-group">
            <label for="prep_description">Enter Preparation Description</label>
            <input type="text" name="prep_description" id="prep_description" class="form-control" value="<?= $row['prep_description'] ?>">
        </div>
        <div class="form-group">
            <label for="prep_time">Enter Preparation Time</label>
            <input type="text" name="prep_time" id="prep_time" class="form-control" value="<?= $row['prep_time'] ?>">
        </div>
        <div class="form-group">
            <label>Choose Recipe Category Name
                <select class="form-control" name="recipe_category_id">
                    <option value="" selected="selected" disabled="disabled">- please choose a category -</option>
                    <?php
                    $category = "SELECT recipes.recipe_categories.recipe_category_id, recipes.recipe_categories.recipe_category_name FROM recipes.recipe_categories";
                    $result_from_query = mysqli_query($connection, $category);

                    if (mysqli_num_rows($result_from_query) > 0) {
                        while ($row_second = mysqli_fetch_assoc($result_from_query)) {

                            if ($row_second['recipe_category_id'] == $row['rcid']) {
                                echo "<option value=" . $row_second['recipe_category_id'] . " selected>" . $row_second['recipe_category_name'] . "</option>";
                            }
                            else {
                                echo "<option value=" . $row_second['recipe_category_id'] . " >" . $row_second['recipe_category_name'] . "</option>";
                            }

                        }

                    } else {
                        die('Query failed!' . mysqli_error($connection));
                    }

                    ?>
                </select>
            </label>
        </div>

        <input type="hidden" name="recipe_id" value="<?= $row['recipe_id'] ?>">
        <button type="submit" class="btn btn-success">Update</button>
    </form>

<?php
if (!empty($_POST)) {
	$recipe_id = $_POST['recipe_id'];
	$recipe_name = $_POST['recipe_name'];
	$prep_description = $_POST['prep_description'];
	$prep_time = $_POST['prep_time'];

	// check if recipe category id is set
    // if yes, add it to query; else, do not
	if (isset($_POST['recipe_category_id'])) {
		$recipe_category_id = $_POST['recipe_category_id'];

		$update_query = "UPDATE `recipes`.recipes 
                     SET `recipe_name`= '$recipe_name' ,
                         `prep_description` = '$prep_description',
                         `prep_time` = '$prep_time',
                         `recipe_category_id` = '$recipe_category_id'
                     WHERE `recipe_id`= $recipe_id";
	}
	else {
		$update_query = "UPDATE `recipes`.recipes 
                     SET `recipe_name`= '$recipe_name' ,
                         `prep_description` = '$prep_description',
                         `prep_time` = '$prep_time'
                     WHERE `recipe_id`= $recipe_id";
    }


	$update_response = mysqli_query($connection, $update_query);

	if (!$update_response) {
		die('Update failed! Invalid category name or other parameter. ' . mysqli_error($connection));
	} else {
		header("Location: index.php");
		echo "Update successful!";
	}
}

include '../../includes/footer.php';
