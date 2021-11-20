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
            <input id="name" type="text" name="name" class="form-control">
        </div>
        <div>
            <label for="age">Age </label>
            <input id="age" type="text" name="age" class="form-control">
        </div>
        <div class="form-group">
            <label>Choose Category Name</label>
            <select class="form-control" name="category_id">
                <option value="" selected="selected" disabled="disabled">- please choose a category -</option>
				<?php
				$product = "SELECT category_id, name, date_created FROM zaici.bunny_categories";
				$result = mysqli_query($connection, $product);

				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value=" . $row['category_id'] . ">" . $row['name'] . " - " . $row['date_created']. "</option>";
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


if (isset($_POST['name']) && isset($_POST['age'])) {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$category_id = $_POST['category_id'];
	$date = date('Y-m-d H:i:s');

	$insert_query = "INSERT INTO zaici.bunnies (`name`,`age`, `category_id`, `date_created`)  
    VALUES ('$name', '$age', $category_id, '$date')";
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
