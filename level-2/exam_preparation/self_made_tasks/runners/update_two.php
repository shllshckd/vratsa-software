<?php

/**
 * @var object $connection
 */
include('partials/header.php');
include('partials/database_connection.php');

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$comp_count = $_POST['comp_count'];
$style_id = $_POST['style_id'];

$message_id = $_POST['runner_id'];

$update_query = "
 	UPDATE runners.runners
 	SET
        runner_first_name = '$f_name',
        runner_last_name = '$l_name',
        runner_competitions_won_count = '$comp_count',
 	    runner_style_id = '$style_id'
 	WHERE runners.runners.runner_id = $message_id";

$update_result = mysqli_query($connection, $update_query);

if ($update_result) {
	header('Location: index.php');
} else {
	exit("Update has failed. Error: " . mysqli_error($connection));
}

include('partials/footer.php');
