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
        <div>
            <label for="email">Email</label>
            <input id="email" type="text" name="email" class="form-control">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input id="phone" type="text" name="phone" class="form-control">
        </div>
        <div>
            <label for="message">Message</label>
            <input id="message" type="text" name="message" class="form-control">
        </div>
        <div class="form-group">
            <label>Choose Product Name</label>
            <select class="form-control" name="product_id">
                <option selected="selected" disabled="disabled">- please choose a product -</option>
				<?php
				$product = "SELECT id, product_name, product_description FROM contact_form.products WHERE date_deleted IS NULL";
				$result = mysqli_query($connection, $product);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
					    // between ">" we had selected, here on the dot " .>"
						echo "<option value=" . $row['id'] . ">" . $row['product_name'] . " - " . $row['product_description']. "</option>";
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

if (isset($_POST['name']) && isset($_POST['email']) &&
    isset($_POST['phone']) && isset($_POST['message'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	$product_id = $_POST['product_id'];

	$date = date('Y-m-d H:i:s');

	$insert_query = "INSERT INTO contact_form.messages (name, email, phone, message, date_created, product_id)  
                     VALUES ('$name', '$email', '$phone', '$message', '$date', $product_id)";

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
