<?php

/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

$name = $_POST['name'];
$age = $_POST['age'];
$category_id = $_POST['category_id'];
$bunny_id = $_POST['bunny_id'];

$update_query = "
 	UPDATE zaici.bunnies
 	SET
        `name` = '$name',
        `age` = '$age',
        `category_id` = '$category_id'
 	WHERE `bunny_id` = $bunny_id";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
