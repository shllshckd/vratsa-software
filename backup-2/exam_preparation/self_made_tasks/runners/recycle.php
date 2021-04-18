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
	$read_query = "SELECT m.runner_id, m.runner_first_name, m.runner_last_name, m.runner_competitions_won_count, m.date_created as runner_date_created, m.date_deleted as runner_date_deleted,
                        s.style_id, s.style_name, s.style_description, s.style_meters_long
                    FROM runners.runners AS m
                    join runners.styles AS s on m.runner_style_id = s.style_id
                    WHERE m.date_deleted IS NOT NULL ORDER BY runner_date_deleted DESC";

	$result = mysqli_query($connection, $read_query);

	if (mysqli_num_rows($result) > 0) {
		echo "<table class='table table-bordered'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>Id</th>";
				echo "<th>First Name</th>";
				echo "<th>Last Name</th>";
				echo "<th>Competitions Won Count</th>";
				echo "<th>Style Name</th>";
                echo "<th>Style Description</th>";
				echo "<th>Style Meters Long</th>";
				echo "<th>Created At</th>";
				echo "<th>Deleted At</th>";
				echo "<th>Actions</th>";
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
                echo "<td>{$row['runner_id']}</td>";
                echo "<td>{$row['runner_first_name']}</td>";
                echo "<td>{$row['runner_last_name']}</td>";
                echo "<td>{$row['runner_competitions_won_count']}</td>";
                echo "<td>{$row['style_name']}</td>";
                echo "<td>{$row['style_description']}</td>";
                echo "<td>{$row['style_meters_long']}</td>";
                echo "<td>{$row['runner_date_created']}</td>";
                echo "<td>{$row['runner_date_deleted']}</td>";
				echo "<td>
                    <a href='delete.php?message_id={$row['runner_id']}' class='btn btn-sm btn-danger'>Delete</a>
                    <a href='restore.php?message_id={$row['runner_id']}' class='btn btn-sm btn-success'>Restore</a>";
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
