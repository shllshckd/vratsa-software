<?php
/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$group_by = $_GET['group_by'];

$delete_query = "DELETE FROM `northwind`.`sales_reports` WHERE `group_by` = '$group_by' LIMIT 1";
$delete_result = mysqli_query($connection, $delete_query);

if ($delete_result) {
	header('Location: index.php');
} else {
	die('Delete Failed! Error: '. mysqli_error($connection));
}

include ('partials/footer.php');
