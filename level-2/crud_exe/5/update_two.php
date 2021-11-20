<?php
/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

// original value, we need it in the WHERE clause
$id_original = $_POST['id_original'];

$address_id = $_POST['AddressID'];
$address_text = $_POST['AddressText'];
$town_id = $_POST['TownID'];

// important! - use already existing TownID
$update_query = "
 	UPDATE `academy`.`addresses`
 	SET
        `AddressID` = '$address_id',
        `AddressText` = '$address_text',
        `TownID` = '$town_id'
 	WHERE `AddressID` = '$id_original'";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
