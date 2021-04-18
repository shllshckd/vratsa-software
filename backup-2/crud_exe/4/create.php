<?php
/**
 * @var object $connection
 */
    include('partials/database_connection.php');
    include('partials/header.php');
?>

<div class="container fluid padding">
<h1>Add Town</h1>
    <form action="" method="post" accept-charset="utf-8">
        <div>
            <label for="TownID">TownID: </label>
            <input id="TownID" type="text" name="TownID" value="" class="form-control">
        </div>
        <div>
            <label for="Name">Name: </label>
            <input id="Name" type="text" name="Name" value="" class="form-control">
        </div>
        <br>
        <input type="submit" name="submit" value="Save" class="btn btn-success">
        <a href="index.php" class="btn btn-outline-dark">Go to home page</a>
        <br><br>
    </form>

<?php

if (isset($_POST['TownID'])) {
	$town_id = $_POST['TownID'];
}
if (isset($_POST['Name'])) {
	$name = $_POST['Name'];
}

$date = date('Y-m-d H:i:s');

if (isset($_POST['TownID']) && isset($_POST['Name'])) {
	$query = "INSERT INTO academy.towns (`TownID`,`Name`) VALUES ('$town_id', '$name')";
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
