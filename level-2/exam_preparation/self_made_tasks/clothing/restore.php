<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$id = $_GET['id'];
$datetime = date('Y-m-d H:i:s');

$update_query = "UPDATE clothing.`rent_request` SET rent_request.`date_deleted` = null WHERE `id` = '$id'";
$result = mysqli_query($connection, $update_query);

if ($result) {
	header('Location: recycle.php');
} else {
	die('Restore Failed! Error: '.mysqli_error($connection));
}

include ('partials/footer.php');
