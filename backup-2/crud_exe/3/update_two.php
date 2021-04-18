<?php
/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

// original value, we need it in the WHERE clause
$pid_o = $_POST['project_id_original'];

$project_id = $_POST['ProjectID'];
$name = $_POST['Name'];
$description = $_POST['Description'];
$start_date = $_POST['StartDate'];
$end_date = $_POST['EndDate'];

$update_query = "
 	UPDATE academy.projects
 	SET
        `ProjectID` = '$project_id',
        `Name` = '$name',
        `Description` = '$description',
        `StartDate` = '$start_date',
        `EndDate` = '$end_date'
 	WHERE `ProjectID` = '$pid_o'";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
