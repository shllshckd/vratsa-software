<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$id = $_GET['id'];

// get message, only one
$get_message_query = "SELECT * FROM clothing.rent_request WHERE id = $id";
$result = mysqli_query($connection, $get_message_query);
$message = mysqli_fetch_assoc($result);

?>

<div class="container fluid padding">
<h1>Update message with ID <?= $message['id'] ?></h1>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="username">Username: </label>
            <input id="username" type="text" name="username" value="<?= $message['username'] ?>" class="form-control">
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
            <label for="request_message">Request Message: </label>
            <input id="request_message" type="text" name="request_message" value="<?= $message['request_message'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Choose Product Name</label>
            <select class="form-control" name="national_clothing_id">
                <option selected="selected" disabled="disabled">- please choose a clothing -</option>
				<?php
				$national_clothing = "SELECT id, name, description FROM clothing.national_clothing";
				$get_clothing = mysqli_query($connection, $national_clothing);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($get_clothing)) {
                        echo "<option value=" . $row['id'] . ">" . $row['name'] . " - " . $row['description']. "</option>";
					}
				} else {
					die('Query failed!' . mysqli_error($connection));
				}
				?>
            </select>
        </div>

        <input type="hidden" name="id" value="<?= $message['id'] ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>