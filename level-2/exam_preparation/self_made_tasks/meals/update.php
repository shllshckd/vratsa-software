<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$message_id = $_GET['message_id'];
$datetime = date('Y-m-d H:i:s');

// get message, only one
$get_message_query = "SELECT m.id, m.name, m.description, k.name as 'kitchen_name' FROM meals.meal_type m
                      JOIN meals.kitchen k on k.id = m.kitchen_id
                      WHERE m.id = $message_id";
$result = mysqli_query($connection, $get_message_query);
$message = mysqli_fetch_assoc($result);

?>

<div class="container fluid padding">
<h1>Update message with ID <?= $message['id'] ?></h1>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="name">Name </label>
            <input id="name" type="text" name="name" value="<?= $message['name'] ?>" class="form-control">
        </div>
        <div>
            <label for="description">Description </label>
            <input id="description" type="text" name="description" value="<?= $message['description'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Choose Kitchen Name</label>
            <select class="form-control" name="kitchen_id">
                <option selected="selected" disabled="disabled">- please choose a kitchen -</option>
				<?php
				$product = "SELECT id as k_id, name as k_name, date_created FROM meals.kitchen";
				$result = mysqli_query($connection, $product);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						//echo "<option value=" . $row['id'] . ">" . $row['name'] . " - " . $row['date_created']. "</option>";
						if ($message['kitchen_name'] == $row['k_name']) {
							echo "<option value=" . $row['k_id'] . " selected>" . $row['k_name'] . "</option>";
						}
						else {
							echo "<option value=" . $row['k_id'] . " >" . $row['k_name'] . "</option>";
						}
					}
				} else {
					die('Query failed!' . mysqli_error($connection));
				}
				?>
            </select>
        </div>

        <input type="hidden" name="message_id" value="<?= $message['id'] ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>