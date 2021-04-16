<?php

/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

$name = $_POST['name'];
$description = $_POST['description'];
$kitchen_id = $_POST['kitchen_id'];
$message_id = $_POST['message_id'];

$update_query = "
 	UPDATE meals.meal_type
 	SET
        name = '$name',
 	    description = '$description',
        kitchen_id = '$kitchen_id'
 	WHERE `id` = $message_id";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
