<?php

/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$request_message = $_POST['request_message'];
$national_clothing_id = $_POST['national_clothing_id'];

$datetime = date('Y-m-d H:i:s');

$id = $_POST['id'];

$update_query = "
 	UPDATE `clothing`.`rent_request`
 	SET
        `username` = '$username',
        `email` = '$email',
        `phone` = '$phone',
 	    `request_message` = '$request_message',
 	    `national_clothing_id` = '$national_clothing_id',
 	    `date_created` = '$datetime'
 	WHERE `id` = $id";

$update_result = mysqli_query($connection, $update_query);
var_dump($update_result);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
