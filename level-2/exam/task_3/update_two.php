<?php

/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

$destination_id = $_POST['destination_id'];
$destination_name = $_POST['destination_name'];
$country_id = $_POST['country_id'];

$update_query = "
 	UPDATE airport.destinations
 	SET
        destination_name = '$destination_name',
        country_id = '$country_id'
 	WHERE destination_id = $destination_id";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
