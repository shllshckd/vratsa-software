<?php

/**
 * @var object $connection
 */
include('../../partials/connection.php');
include('../../partials/header.php');

$id = $_GET['id'];
$read_query = "SELECT * FROM recipes.units WHERE `units`.`unit_id` = $id LIMIT 1";

$result = mysqli_query($connection, $read_query);

if ($result) {
	$row = mysqli_fetch_assoc($result);
}

?>

<form action="" method="post">
    <input type="hidden" name="unit_id" value="<?= $row['unit_id'] ?>">

    <div class="form-group">
        <label for="unit_name">Enter Unit Name</label>
        <input class="form-control" type="text" name="unit_name" value="<?= $row['unit_name']?>" id="unit_name">
    </div>

    <button class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-outline-dark">Go to index</a>
</form>

<?php

if (!empty($_POST)) {
	$unit_id = $_POST['unit_id'];
	$unit_name = $_POST['unit_name'];

	$update_query = "UPDATE `recipes`.`units` SET `unit_name` = '$unit_name' WHERE `unit_id` = $unit_id";
	$result = mysqli_query($connection, $update_query);

	if ($result) {
		echo "Successfully updated record.";
	} else {
		exit('Operation failed. Error: ' . mysqli_error($connection));
	}
}


