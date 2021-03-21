<?php

/**
 * @var object $connection
 */
include '../../includes/db_connect.php';

$current_date = date('Y-m-d');
$update_query = "UPDATE recipes.`recipes` SET `date_deleted`= '$current_date' WHERE `recipe_id`=" . $_GET['id'];

$res = mysqli_query($connection, $update_query);

if ($res) {
	header('Location: index.php');
} else {
	die('Delete failed' . mysqli_error($connection));
}
