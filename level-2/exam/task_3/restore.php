<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$destination_id = $_GET['destination_id'];
$datetime = date('Y-m-d H:i:s');

$update_query = "UPDATE airport.destinations SET date_deleted = NULL WHERE destination_id = '$destination_id'";
$result = mysqli_query($connection, $update_query);

if ($result) {
	header('Location: recycle.php');
} else {
	die('Restore Failed! Error: '.mysqli_error($connection));
}

include ('partials/footer.php');
