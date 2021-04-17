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
	$read_query = "SELECT m.id, m.name, m.description, m.date_created, m.date_deleted,
                        k.name as 'kitchen_name'
                   FROM meals.meal_type as m
                   JOIN meals.kitchen as k on k.id = m.kitchen_id
                   WHERE m.date_deleted IS NOT NULL
                   ORDER BY m.date_created DESC";
	$result = mysqli_query($connection, $read_query);

	if (mysqli_num_rows($result) > 0) {
		echo "<table class='table table-bordered'>";
		echo "<thead>";
			echo "<tr>";
		        echo "<th>Id</th>";
		        echo "<th>Name</th>";
				echo "<th>Description</th>";
				echo "<th>Kitchen Name</th>";
				echo "<th>Date Created</th>";
		        echo "<th>Date Deleted</th>";
				echo "<th>Actions</th>";
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['description']."</td>";
				echo "<td>".$row['kitchen_name']."</td>";
				echo "<td>".$row['date_created']."</td>";
				echo "<td>".$row['date_deleted']."</td>";
				echo "<td>
                    <a href='delete.php?message_id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a>
                    <a href='restore.php?message_id={$row['id']}' class='btn btn-sm btn-success'>Restore</a>";
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
