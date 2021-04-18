<?php

/**
 * @var object $connection
 */
include('../../partials/header.php');

$id = $_GET['id'];

$delete_query = "DELETE FROM `recipes`.`products` WHERE `products`.`product_id` = $id";
$result = mysqli_query($connection, $delete_query);

if ($result) {
	header('Location: recycle_bin.php');
} else {
	exit('Delete failed. ' . mysqli_error($connection));
}
