<?php

/**
 * @var object $connection
 */
include('../../partials/header.php');

?>

    <h1>Add New Unit</h1>
<form method="post" action="">
    <div class="form-group">
        <label for="unit_name">Unit Name</label>
        <input class="form-control" type="text" name="unit_name" id="unit_name">
    </div>

    <button type="submit" name="submit" value="Save" class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-outline-dark">Go to index</a>
</form>

<?php

if (isset($_POST['unit_name'])) {
	$unit_name = $_POST['unit_name'];

	$insert_query = "INSERT INTO `recipes`.`units` (`unit_name`) VALUES ('$unit_name')";
	$result = mysqli_query($connection, $insert_query);

	if ($result) {
		echo "Successfully added unit!";
	} else {
		exit('Create failed. ' . mysqli_error($connection));
	}
}

include ('../../partials/footer.php');
