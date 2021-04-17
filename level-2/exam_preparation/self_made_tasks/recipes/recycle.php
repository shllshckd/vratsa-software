<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

?>

<div class="container fluid padding">
    <h1>Recycle Bin</h1>
	<h2>All soft-deleted entries</h2>

	<?php
	$read_query = "SELECT m.recipe_id, m.recipe_name, m.prep_description, m.prep_time, m.date_created, m.date_deleted, c.recipe_category_id, 
                          c.recipe_category_name
                   FROM recipes.recipes as m 
                   JOIN recipes.recipe_categories as c on m.recipe_category_id = c.recipe_category_id
                   WHERE m.`date_deleted` IS NOT NULL ORDER BY m.date_deleted DESC";

	$result = mysqli_query($connection, $read_query);

	if (mysqli_num_rows($result) > 0) {
		echo "<table class='table table-bordered'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>Id</th>";
				echo "<th>Name</th>";
				echo "<th>Email</th>";
				echo "<th>Phone</th>";
				echo "<th>Message</th>";
				echo "<th>Created At</th>";
				echo "<th>Deleted At</th>";
				echo "<th>Actions</th>";
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
                echo "<td>{$row['recipe_id']}</td>";
                echo "<td>{$row['recipe_name']}</td>";
                echo "<td>{$row['prep_description']}</td>";
                echo "<td>{$row['prep_time']}</td>";
                echo "<td>{$row['recipe_category_name']}</td>";
                echo "<td>{$row['date_created']}</td>";
			    echo "<td>{$row['date_deleted']}</td>";
				echo "<td>
                    <a href='delete.php?message_id={$row['recipe_id']}' class='btn btn-sm btn-danger'>Delete</a>
                    <a href='restore.php?message_id={$row['recipe_id']}' class='btn btn-sm btn-success'>Restore</a>";
			    echo "</td>";
			echo "</tr>";
		}

		echo "</tbody>";
		echo "</table>";
	} else {
		echo "<br>";
		echo "No matching results were found.";
		echo "<br><br>";
	}
?>

    <a href="index.php" class="btn btn-outline-dark">Back</a>
</div>

<?php

include ('partials/footer.php');
