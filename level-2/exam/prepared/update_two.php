<?php

/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$product_id = $_POST['product_id'];

$message_id = $_POST['message_id'];

$update_query = "
 	UPDATE `contact_form`.`messages`
 	SET
        `name` = '$name',
        `email` = '$email',
        `phone` = '$phone',
 	    `product_id` = '$product_id',
        `message` = '$message'
 	WHERE `message_id` = $message_id";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
