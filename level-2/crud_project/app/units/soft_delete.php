<?php
/**
 * @var object $connection
 */
include('../../partials/header.php');

$current_date = date('Y-m-d');

$id = $_GET['id'];
$query = "UPDATE `recipes`.`units` SET `date_deleted` = '$current_date' WHERE `unit_id` = $id LIMIT  1";
$result= mysqli_query($connection, $query);

if ($result) {
	header('Location: index.php');
} else {
	exit('Delete failed.' . mysqli_error($connection));
}
