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
	$read_query = "SELECT b.bunny_id, b.name, b.age, bc.name as bc_name, b.date_created, b.date_deleted    
                   FROM zaici.`bunnies` as b 
                   LEFT JOIN zaici.bunny_categories as bc on bc.category_id = b.category_id
                   WHERE b.`date_deleted` IS NOT NULL ORDER BY `date_created` DESC";
	$result = mysqli_query($connection, $read_query);

	if (mysqli_num_rows($result) > 0) {
		echo "<table class='table table-bordered'>";
		echo "<thead>";
			echo "<tr>";
				echo "<th>Id</th>";
				echo "<th>Name</th>";
				echo "<th>Age</th>";
				echo "<th>Bunny Category Name</th>";
				echo "<th>Created At</th>";
				echo "<th>Deleted At</th>";
				echo "<th>Actions</th>";
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";

		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
				echo "<td>".$row['bunny_id']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['age']."</td>";
				echo "<td>".$row['bc_name']."</td>";
				echo "<td>".$row['date_created']."</td>";
				echo "<td>".$row['date_deleted']."</td>";
				echo "<td>
                    <a href='delete.php?message_id={$row['bunny_id']}' class='btn btn-sm btn-danger'>Delete</a>
                    <a href='restore.php?message_id={$row['bunny_id']}' class='btn btn-sm btn-success'>Restore</a>";
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
