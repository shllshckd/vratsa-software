<?php
/**
 * @var object $connection
 */
    include('partials/database_connection.php');
    include('partials/header.php');
?>

<div class="container fluid padding">
<h1>Add Sale Report</h1>
    <form action="" method="post" accept-charset="utf-8">
        <div>
            <label for="group_by">Group By: </label>
            <input id="group_by" type="text" name="group_by" value="" class="form-control">
        </div>
        <div>
            <label for="display">Display: </label>
            <input id="display" type="text" name="display" value="" class="form-control">
        </div>
        <div>
            <label for="title">Title: </label>
            <input id="title" type="text" name="title" value="" class="form-control">
        </div>
        <div>
            <label for="filter_row_source">Filter Row Source: </label>
            <input id="filter_row_source" type="text" name="filter_row_source" value="" class="form-control">
        </div>
        <div>
            <label for="default">Default: </label>
            <input id="default" type="text" name="default" value="" class="form-control">
        </div>
        <br>
        <input type="submit" name="submit" value="Save" class="btn btn-success">
        <a href="index.php" class="btn btn-outline-dark">Go to home page</a>
        <br><br>
    </form>

<?php

if (isset($_POST['group_by'])) {
	$group_by = $_POST['group_by'];
}
if (isset($_POST['display'])) {
	$display = $_POST['display'];
}
if (isset($_POST['title'])) {
	$title = $_POST['title'];
}
if (isset($_POST['filter_row_source'])) {
	$filter_row_source = $_POST['filter_row_source'];
}
if (isset($_POST['default'])) {
	$default = $_POST['default'];
}

$date = date('Y-m-d H:i:s');

if (isset($_POST['group_by']) && isset($_POST['display']) && isset($_POST['title']) && isset($_POST['filter_row_source']) && isset($_POST['default'])) {
	$query = "INSERT INTO `northwind`.sales_reports (`group_by`,`display`,`title`,`filter_row_source`, `default`) 
    VALUES ('$group_by', '$display', '$title', '$filter_row_source', '$default')";

	$result = mysqli_query($connection, $query);

	if ($result) {
		echo "Successfully created record.";
	}
	else {
		exit('Operation failed. Error: ' . mysqli_error($connection));
	}
}

echo "</div>";

include ('partials/footer.php');
