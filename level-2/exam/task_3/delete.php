<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');


$destination_id = $_GET['destination_id'];

$delete_query = "DELETE FROM airport.destinations WHERE destination_id = '$destination_id' LIMIT 1";
$delete_result = mysqli_query($connection, $delete_query);

if ($delete_result) {
	header('Location: recycle.php');
} else {
	die('Delete Failed! Error: '.mysqli_error($connection));
}

include ('partials/footer.php');
