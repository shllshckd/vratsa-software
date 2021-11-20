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
            <label for="username">Username</label>
            <input id="username" type="text" name="username" class="form-control">
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
            <label for="request_message">Message </label>
            <input id="request_message" type="text" name="request_message" class="form-control">
        </div>
        <div class="form-group">
            <label>Choose National Clothing Name</label>
            <select class="form-control" name="clothing_id">
                <option selected disabled="disabled">- please choose a product -</option>
				<?php
				$clothing = "SELECT id, name as national_clothing_name, description
                             FROM clothing.national_clothing";
				$result = mysqli_query($connection, $clothing);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value=" . $row['id'] . ">" . $row['national_clothing_name'] . " - " . $row['description']. "</option>";
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


if (isset($_POST['username']) && isset($_POST['email']) &&
    isset($_POST['phone']) && isset($_POST['request_message'])) {

	$name = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['request_message'];
	$clothing_id = $_POST['clothing_id'];

	$date = date('Y-m-d');

	$insert_query = "INSERT INTO clothing.rent_request (`username`,`email`,`phone`,`request_message`, `national_clothing_id`, date_created)  
    VALUES ('$name', '$email', '$phone', '$message', $clothing_id, '$date')";

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
