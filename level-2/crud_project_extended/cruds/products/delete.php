<?php

/**
 * @var object $connection
 */
include '../../includes/db_connect.php';

// images
$product_id = $_GET['id'];
$delete_query = "DELETE FROM recipes.products WHERE product_id = " . $product_id . " LIMIT 1";
$delete_res = mysqli_query($connection, $delete_query);

if ($delete_res) {
	header('Location: recycle_bin.php');
} else {
	die('Deletion failed' . mysqli_error($connection));
}

// delete image