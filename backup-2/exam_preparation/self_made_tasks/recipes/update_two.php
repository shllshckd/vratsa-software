<?php

/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

$name = $_POST['name'];
$prep_description = $_POST['prep_description'];
$prep_time = $_POST['prep_time'];
$category_id = $_POST['category_id'];

$recipe_id = $_POST['recipe_id'];

$update_query = "
 	UPDATE recipes.recipes
 	SET
        recipe_name = '$name',
        prep_description = '$prep_description',
        prep_time = $prep_time,
 	    recipe_category_id = $category_id
 	WHERE `recipe_id` = $recipe_id";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
