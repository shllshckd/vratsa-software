<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$message_id = $_GET['message_id'];
$datetime = date('Y-m-d H:i:s');

// get message, only one
$get_message_query = "SELECT * FROM contact_form.messages WHERE message_id = $message_id";
$result = mysqli_query($connection, $get_message_query);
$message = mysqli_fetch_assoc($result);

?>

<div class="container fluid padding p-3">
    <h1>CRUD - Update entry with ID <?= $message['message_id'] ?></h1>
    <hr>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="name">Name: </label>
            <input id="name" type="text" name="name" value="<?= $message['name'] ?>" class="form-control">
        </div>
        <div>
            <label for="email">Email: </label>
            <input id="email" type="text" name="email" value="<?= $message['email'] ?>" class="form-control">
        </div>
        <div>
            <label for="phone">Phone: </label>
            <input id="phone" type="text" name="phone" value="<?= $message['phone'] ?>" class="form-control">
        </div>
        <div>
            <label for="message">Message: </label>
            <input id="message" type="text" name="message" value="<?= $message['message'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Choose Product Name</label>
            <select class="form-control" name="product_id">
                <option value="" selected="selected" disabled="disabled">- please choose a product -</option>
				<?php
				$product = "SELECT id, product_name, product_description FROM contact_form.products WHERE date_deleted IS NULL";
				$result_product = mysqli_query($connection, $product);

				if (mysqli_num_rows($result_product) > 0) {
					while ($row = mysqli_fetch_assoc($result_product)) {
					    // if product_id from message is equal to product id from products
						if ($message['product_id'] == $row['id']) {
							echo "<option value=" . $row['id'] . " selected>" . $row['product_name'] . " - " . $row['product_description'] . "</option>";
						}
						else {
							echo "<option value=" . $row['id'] . " >" . $row['product_name'] . " - " . $row['product_description'] ."</option>";
						}
						//echo "<option value=" . $row['id'] . ">" . $row['product_name'] . " - " . $row['product_description']. "</option>";
					}
				} else {
					die('Query failed!' . mysqli_error($connection));
				}
				?>
            </select>
        </div>

        <input type="hidden" name="message_id" value="<?= $message['message_id'] ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>