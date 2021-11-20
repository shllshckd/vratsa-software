<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

?>

<form method="post" action="">
    <div class="form-group">
        <label for="unit_name">Enter unit name</label>
        <input type="text" name="unit_name" id="unit_name" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>

<?php

if (isset($_POST['unit_name'])) {
	$unit_name = $_POST['unit_name'];

	$insert_query = "INSERT INTO recipes.`units`(`unit_name`) VALUES ('$unit_name')";
	$result = mysqli_query($connection, $insert_query);

	if ($result) {
		echo "Recorde created successfuly";
	} else {
		die('Query failed!' . mysqli_error($connection));
	}
}

include '../../includes/footer.php';
