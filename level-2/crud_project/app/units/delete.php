<?php

/**
 * @var object $connection
 */
include('../../partials/connection.php');
include('../../partials/header.php');

$id = $_GET['id'];
$delete_query = "DELETE FROM `recipes`.`units` WHERE `recipes`.`units`.`unit_id` = '$id'";
$result = mysqli_query($connection, $delete_query);

if ($result) {
	header('Location: recycle_bin.php');
} else {
	exit('Delete failed. ' . mysqli_error($connection));
}
