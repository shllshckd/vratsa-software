<?php

/**
 * @var object $connection
 */
include('../../partials/connection.php');
include('../../partials/header.php');

$id = $_GET['id'];
$delete_query = "UPDATE `recipes`.`products` SET `recipes`.`products`.date_deleted = NULL
  				 WHERE `recipes`.`products`.`product_id` = $id";

$result = mysqli_query($connection, $delete_query);

if ($result) {
	header('Location: recycle_bin.php');
} else {
	exit('Delete failed. ' . mysqli_error($connection));
}
