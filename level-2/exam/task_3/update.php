<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$destination_id = $_GET['destination_id'];
$datetime = date('Y-m-d H:i:s');

// get message, only one
///$get_message_query = "SELECT * FROM airport.destinations WHERE destination_id = $destination_id";
$get_message_query = "
                   SELECT m.destination_id, m.destination_name,
                          c.country_name as outer_country_name, c.country_id as outer_country_id
                   FROM airport.destinations as m 
                   join airport.countries as c on c.country_id = m.country_id
                   WHERE m.date_deleted IS NULL and m.destination_id = $destination_id";

$result = mysqli_query($connection, $get_message_query);
$message = mysqli_fetch_assoc($result);

?>

<div class="container fluid padding p-3">
    <h1>CRUD - Update entry with ID <?= $message['destination_id'] ?></h1>
    <hr>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="destination_name">Destination Name</label>
            <input id="destination_name" type="text" name="destination_name" value="<?= $message['destination_name'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Choose Country Name</label>
            <select class="form-control" name="country_id">
                <option value="" selected="selected" disabled="disabled">- please choose a country -</option>
				<?php
				$country = "SELECT country_id, country_name FROM airport.countries WHERE date_deleted IS NULL";
				$result_product = mysqli_query($connection, $country);

				if (mysqli_num_rows($result_product) > 0) {
					while ($row = mysqli_fetch_assoc($result_product)) {
					     //if product_id from message is equal to product id from products
						if ($message['outer_country_id'] == $row['country_id']) {
							echo "<option value=" . $row['country_id'] . " selected>" . $row['country_name'] . "</option>";
						}
						else {
							echo "<option value=" . $row['country_id'] . " >" . $row['country_name'] ."</option>";
						}
						//echo "<option value=" . $row['country_id'] . ">" . $row['country_name']. "</option>";
					}
				} else {
					die('Query failed!' . mysqli_error($connection));
				}
				?>
            </select>
        </div>

        <input type="hidden" name="destination_id" value="<?= $message['destination_id'] ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>