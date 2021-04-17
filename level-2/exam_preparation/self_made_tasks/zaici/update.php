<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$message_id = $_GET['message_id'];
$datetime = date('Y-m-d H:i:s');

// get message, only one
$get_message_query = "SELECT * FROM zaici.bunnies WHERE bunny_id = $message_id";
$result = mysqli_query($connection, $get_message_query);
$message = mysqli_fetch_assoc($result);

?>

<div class="container fluid padding">
<h1>Update bunny with ID <?= $message['bunny_id'] ?></h1>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="name">Name: </label>
            <input id="name" type="text" name="name" value="<?= $message['name'] ?>" class="form-control">
        </div>
        <div>
            <label for="age">Age: </label>
            <input id="age" type="text" name="age" value="<?= $message['age'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Choose Category Name</label>
            <select class="form-control" name="category_id">
                <option value="" selected="selected" disabled="disabled">- please choose a category -</option>
				<?php
				$categories = "SELECT category_id, name as bc_name, date_created 
                               FROM zaici.bunny_categories WHERE date_deleted is null";
				$result_category = mysqli_query($connection, $categories);

				if (mysqli_num_rows($result_category) > 0) {
					while ($row = mysqli_fetch_assoc($result_category)) {
						echo "<option value=" . $row['category_id'] . ">" . $row['bc_name'] . " - " . $row['date_created']. "</option>";
					}
				} else {
					die('Query failed!' . mysqli_error($connection));
				}
				?>
            </select>

        </div>

        <input type="hidden" name="bunny_id" value="<?= $message['bunny_id'] ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>