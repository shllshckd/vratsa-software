<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$runner_id = $_GET['message_id'];
$datetime = date('Y-m-d H:i:s');
$update_query = "UPDATE runners.runners SET date_deleted = '$datetime' WHERE runner_id = '$runner_id'";
$result = mysqli_query($connection, $update_query);

if ($result) {
	header('Location: index.php');
} else {
	exit('Soft Delete Failed! Error: '. mysqli_error($connection));
}

include('partials/footer.php');
