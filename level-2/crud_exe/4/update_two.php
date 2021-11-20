<?php
/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

// original value, we need it in the WHERE clause
$id_original = $_POST['id_original'];

$town_id = $_POST['TownID'];
$name = $_POST['Name'];

$update_query = "
 	UPDATE `academy`.`towns`
 	SET
        `TownID` = '$town_id',
        `Name` = '$name'
 	WHERE `TownID` = '$id_original'";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
