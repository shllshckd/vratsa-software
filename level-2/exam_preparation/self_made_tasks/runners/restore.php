<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$message_id = $_GET['message_id'];
$datetime = date('Y-m-d H:i:s');

$update_query = "UPDATE runners.runners SET date_deleted = NULL WHERE runner_id = '$message_id'";
$result = mysqli_query($connection, $update_query);

if ($result) {
	header('Location: recycle.php');
} else {
	die('Restore Failed! Error: '.mysqli_error($connection));
}

include ('partials/footer.php');
