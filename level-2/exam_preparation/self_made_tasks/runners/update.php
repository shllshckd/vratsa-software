<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$message_id = $_GET['message_id'];
$datetime = date('Y-m-d H:i:s');

// get message, only one
$get_message_query = "SELECT * FROM runners.runners WHERE runner_id = $message_id";
$result = mysqli_query($connection, $get_message_query);
$message = mysqli_fetch_assoc($result);

?>

<div class="container fluid padding">
<h1>Update message with ID <?= $message['runner_id'] ?></h1>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="f_name">First Name: </label>
            <input id="f_name" type="text" name="f_name" value="<?= $message['runner_first_name'] ?>" class="form-control">
        </div>
        <div>
            <label for="l_name">Last Name: </label>
            <input id="l_name" type="text" name="l_name" value="<?= $message['runner_last_name'] ?>" class="form-control">
        </div>
        <div>
            <label for="comp_count">Competitions Won Count: </label>
            <input id="comp_count" type="text" name="comp_count" value="<?= $message['runner_competitions_won_count'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Choose Runner Style Name</label>
            <select class="form-control" name="style_id">
                <option value="" selected="selected" disabled="disabled">- please choose a style -</option>
				<?php
				$product = "SELECT style_id, style_name, style_description, style_meters_long FROM runners.styles WHERE date_deleted IS NULL";
				$result_product = mysqli_query($connection, $product);

				if (mysqli_num_rows($result_product) > 0) {
					while ($row = mysqli_fetch_assoc($result_product)) {
					    // if product_id from message is equal to product id from products
						if ($message['runner_style_id'] == $row['style_id']) {
							echo "<option selected value=" . $row['style_id'] . " >" . $row['style_name'] . "</option>";
						}
						else {
							echo "<option value=" . $row['style_id'] . ">" . $row['style_name']
								. " - " . $row['style_description'] . " - " . $row['style_meters_long'] . "</option>";
						}
						//echo "<option value=" . $row['id'] . ">" . $row['product_name'] . " - " . $row['product_description']. "</option>";
					}
				} else {
					die('Query failed!' . mysqli_error($connection));
				}
				?>
            </select>
        </div>

        <input type="hidden" name="runner_id" value="<?= $message['runner_id'] ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>