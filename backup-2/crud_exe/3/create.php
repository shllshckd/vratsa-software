<?php
/**
 * @var object $connection
 */
    include('partials/database_connection.php');
    include('partials/header.php');
?>

<div class="container fluid padding">
<h1>Add Project</h1>
    <form action="" method="post" accept-charset="utf-8">
        <div>
            <label for="ProjectID">ProjectId: </label>
            <input id="ProjectID" type="text" name="ProjectID" value="" class="form-control">
        </div>
        <div>
            <label for="Name">Name: </label>
            <input id="Name" type="text" name="Name" value="" class="form-control">
        </div>
        <div>
            <label for="Description">Description: </label>
            <input id="Description" type="text" name="Description" value="" class="form-control">
        </div>
        <div>
            <label for="StartDate">StartDate: </label>
            <input id="StartDate" type="text" name="StartDate" value="" class="form-control">
        </div>
        <div>
            <label for="EndDate">EndDate: </label>
            <input id="EndDate" type="text" name="EndDate" value="" class="form-control">
        </div>
        <br>
        <input type="submit" name="submit" value="Save" class="btn btn-success">
        <a href="index.php" class="btn btn-outline-dark">Go to home page</a>
        <br><br>
    </form>

<?php

if (isset($_POST['ProjectID'])) {
	$project_id = $_POST['ProjectID'];
}
if (isset($_POST['Name'])) {
	$name = $_POST['Name'];
}
if (isset($_POST['Description'])) {
	$description = $_POST['Description'];
}
if (isset($_POST['StartDate'])) {
	$start_date = $_POST['StartDate'];
}
if (isset($_POST['EndDate'])) {
	$end_date = $_POST['EndDate'];
}

$date = date('Y-m-d H:i:s');

if (isset($_POST['ProjectID']) && isset($_POST['Name']) && isset($_POST['Description']) && isset($_POST['StartDate']) && isset($_POST['EndDate'])) {
	$query = "INSERT INTO academy.projects (`ProjectID`,`Name`,`Description`,`StartDate`, `EndDate`) 
    VALUES ('$project_id', '$name', '$description', '$start_date', '$end_date')";

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
