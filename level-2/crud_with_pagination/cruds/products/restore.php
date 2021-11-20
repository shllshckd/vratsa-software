<?php

/**
 * @var object $connection
 */
include '../../includes/db_connect.php';

$update_query = "UPDATE recipes.products SET date_deleted= NULL WHERE product_id = " . $_GET['id'];
$res = mysqli_query($connection, $update_query);

if ($res) {
	header('Location: recycle_bin.php');
} else {
	die('Delete failed' . mysqli_error($connection));
}
