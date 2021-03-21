<?php

/**
 * @var object $connection
 */
include '../../includes/db_connect.php';

$current_date = date('Y-m-d');
// var_dump($current_date);
$update_query = "UPDATE recipes.`products` SET `date_deleted`= '$current_date' WHERE `product_id` = " . $_GET['id'];

$res = mysqli_query($connection, $update_query);

if($res){
	header('Location: index.php');
}else {
	die('Delete failed' . mysqli_error($connection));
}
