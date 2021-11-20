<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

?>

<div class="container fluid padding">
<h1>Add message</h1>
    <form action="" method="post" accept-charset="utf-8">
        <div>
            <label for="f_name">First Name</label>
            <input id="f_name" type="text" name="f_name" class="form-control">
        </div>
        <div>
            <label for="l_name">Last Name</label>
            <input id="l_name" type="text" name="l_name" class="form-control">
        </div>
        <div>
            <label for="comp_count">Competitions Won Count</label>
            <input id="comp_count" type="text" name="comp_count" class="form-control">
        </div>
        <div class="form-group">
            <label>Choose Runner Style Name</label>
            <select class="form-control" name="style_id">
                <option selected="selected" disabled="disabled">- please choose a style -</option>
				<?php
				$product = "SELECT s.style_id, s.style_name, s.style_description, s.style_meters_long, s.date_created
                            FROM runners.styles AS s 
                            WHERE s.date_deleted IS NULL";
				$result = mysqli_query($connection, $product);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value=" . $row['style_id'] . ">" . $row['style_name'] . " - " . $row['style_description']. "</option>";
					}
				} else {
					die('Query failed!' . mysqli_error($connection));
				}
				?>
            </select>
        </div>

        <br>
        <input type="submit" name="submit" value="Save" class="btn btn-success">
        <a href="index.php" class="btn btn-outline-dark">Go to home page</a>
        <br><br>
    </form>

<?php

if (isset($_POST['f_name']) && isset($_POST['l_name']) &&
    isset($_POST['comp_count']) && isset($_POST['style_id'])) {

	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$comp_count = $_POST['comp_count'];
	$style_id = $_POST['style_id'];

	$date = date('Y-m-d H:i:s');

	$insert_query = "INSERT INTO runners.runners (runner_first_name, runner_last_name, runner_competitions_won_count, runner_style_id, date_created)  
                     VALUES ('$f_name', '$l_name', $comp_count, $style_id, '$date')";
	$result = mysqli_query($connection, $insert_query);

	if ($result) {
		echo "Successfully created record.";
	}
	else {
		exit('Insert query failed. Error: ' . mysqli_error($connection));
	}
}

echo "</div>";

include ('partials/footer.php');
