<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

?>

<div class="container fluid padding">
    <h1>Recycle Bin</h1>
	<h2>All Soft-Deleted Messages</h2>

	<?php
	$read_query = "SELECT * FROM contact_form.messages WHERE `deleted_at` IS NOT NULL ORDER BY `created_at` DESC";
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
				echo "<td>".$row['message_id']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['phone']."</td>";
				echo "<td>".$row['message']."</td>";
				echo "<td>".$row['created_at']."</td>";
				echo "<td>".$row['deleted_at']."</td>";
				echo "<td>
                    <a href='delete.php?message_id={$row['message_id']}' class='btn btn-sm btn-danger'>Delete</a>
                    <a href='restore.php?message_id={$row['message_id']}' class='btn btn-sm btn-success'>Restore</a>";
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
