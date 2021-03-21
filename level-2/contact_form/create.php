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
            <label for="name">Name </label>
            <input id="name" type="text" name="name" value="" class="form-control">
            <small>Name must be at least 3 characters.</small>
        </div>
        <div>
            <label for="email">Email </label>
            <input id="email" type="text" name="email" value="" class="form-control">
        </div>
        <div>
            <label for="phone">Phone </label>
            <input id="phone" type="text" name="phone" value="" class="form-control">
        </div>
        <div>
            <label for="message">Message </label>
            <input id="message" type="text" name="message" value="" class="form-control">
            <small>Message must be at least 3 characters.</small>
        </div>
        <div class="form-group">
            <label>Choose Product Category Name</label>
            <select class="form-control" name="product_id">
                <option value="" selected="selected" disabled="disabled">- please choose a category -</option>
				<?php
				$product = "SELECT id, product_name, product_description FROM contact_form.products";
				$result_inner = mysqli_query($connection, $product);

				if (mysqli_num_rows($result_inner) > 0) {
					while ($row_inner = mysqli_fetch_assoc($result_inner)) {
						echo "<option value=" . $row_inner['id'] . " selected>" . $row_inner['product_name'] . " - " .  $row_inner['product_description']. "</option>";
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


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	$product_id = $_POST['product_id'];

	$date = date('Y-m-d H:i:s');

	$insert_query = "INSERT INTO contact_form.`messages` (`name`,`email`,`phone`,`message`, `created_at`, product_id)  
    VALUES ('$name', '$email', '$phone', '$message', '$date', '$product_id')";

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
