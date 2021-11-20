<?php
/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$id = $_GET['id'];

$delete_query = "DELETE FROM academy.addresses WHERE `AddressID` = '$id' LIMIT 1";
$delete_result = mysqli_query($connection, $delete_query);

if ($delete_result) {
	header('Location: index.php');
} else {
	die('Delete Failed! Error: '. mysqli_error($connection));
}

include ('partials/footer.php');
