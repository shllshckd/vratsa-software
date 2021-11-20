<?php
/**
 * @var object $connection
 */
    include('partials/database_connection.php');
    include('partials/header.php');
?>

<div class="container fluid padding">
<h1>Add Address</h1>
    <form action="" method="post" accept-charset="utf-8">
        <div>
            <label for="AddressID">Address ID: </label>
            <input id="AddressID" type="text" name="AddressID" value="" class="form-control">
        </div>
        <div>
            <label for="AddressText">Address Text: </label>
            <input id="AddressText" type="text" name="AddressText" value="" class="form-control">
        </div>
        <div>
            <label for="TownID">Town ID: </label>
            <input id="TownID" type="text" name="TownID" value="" class="form-control">
        </div>
        <br>
        <input type="submit" name="submit" value="Save" class="btn btn-success">
        <a href="index.php" class="btn btn-outline-dark">Go to home page</a>
        <br><br>
    </form>

<?php

if (isset($_POST['AddressID'])) {
	$address_id = $_POST['AddressID'];
}
if (isset($_POST['AddressText'])) {
	$address_text = $_POST['AddressText'];
}
if (isset($_POST['TownID'])) {
	$town_id = $_POST['TownID'];
}

// test with TownID 32, 11, 4 or something existing
// important! - use TownID that already exists
if (isset($_POST['AddressID']) && isset($_POST['AddressText']) && isset($_POST['TownID']) ) {
	$query = "INSERT INTO academy.addresses (`AddressID`,`AddressText`, `TownID`) 
              VALUES ('$address_id', '$address_text', '$town_id')";

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
