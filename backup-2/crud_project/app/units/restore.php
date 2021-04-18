<?php

/**
 * @var object $connection
 */
include('../../partials/connection.php');
include('../../partials/header.php');

$id = $_GET['id'];
$delete_query = "UPDATE `recipes`.`units` 
				 SET `recipes`.`units`.`date_deleted` = NULL 
				 WHERE `recipes`.`units`.`unit_id` = $id";

$result = mysqli_query($connection, $delete_query);

if ($result) {
	header('Location: recycle_bin.php');
} else {
	exit('Delete failed. ' . mysqli_error($connection));
}
