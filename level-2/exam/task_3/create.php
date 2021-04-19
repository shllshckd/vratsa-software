<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

?>

<div class="container fluid padding p-3">
    <h1 class="">CRUD - Create an entry</h1>
    <hr>
    <form action="" method="post" accept-charset="utf-8">
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Choose Country Name</label>
            <select class="form-control" name="country_id">
                <option selected="selected" disabled="disabled">- please choose a country -</option>
				<?php
				$product = "SELECT country_id, country_name, date_deleted FROM airport.countries WHERE date_deleted IS NULL";
				$result = mysqli_query($connection, $product);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
					    // between ">" we had selected, here on the dot " .>"
						echo "<option value=" . $row['country_id'] . ">" . $row['country_name'] . "</option>";
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

if (isset($_POST['name']) && isset($_POST['country_id'])) {
	$name = $_POST['name'];
	$country_id = $_POST['country_id'];

	//date = date('Y-m-d H:i:s');

	$insert_query = "INSERT INTO airport.destinations (destination_name, country_id)  
                     VALUES ('$name', $country_id)";

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
