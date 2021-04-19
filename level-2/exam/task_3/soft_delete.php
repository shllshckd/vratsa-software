<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$destination_id = $_GET['destination_id'];
$datetime = date('Y-m-d H:i:s');

$update_query = "UPDATE airport.destinations SET date_deleted = '$datetime' WHERE destination_id = '$destination_id'";
$result = mysqli_query($connection, $update_query);

if ($result) {
	header('Location: index.php');
} else {
	exit('Soft Delete Failed! Error: '. mysqli_error($connection));
}

include('partials/footer.php');
