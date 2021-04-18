<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$message_id = $_GET['id'];
$datetime = date('Y-m-d H:i:s');

$update_query = "UPDATE clothing.`rent_request` SET `date_deleted` = '$datetime' WHERE `id` = '$message_id'";
$result = mysqli_query($connection, $update_query);

if ($result) {
	header('Location: index.php');
} else {
	exit('Soft Delete Failed! Error: '. mysqli_error($connection));
}

include('partials/footer.php');
