<?php
/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

// original value, we need it in the WHERE clause
$gbo = $_POST['group_by_original'];

$group_by = $_POST['group_by'];
$display = $_POST['display'];
$title = $_POST['title'];
$filter_row_source = $_POST['filter_row_source'];
$default = $_POST['default'];

$update_query = "
 	UPDATE northwind.sales_reports
 	SET
        `group_by` = '$group_by',
        `display` = '$display',
        `title` = '$title',
        `filter_row_source` = '$filter_row_source',
        `default` = '$default'
 	WHERE `group_by` = '$gbo'";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
