<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

?>

<div class="container fluid padding p-3">
    <h1>CRUD - Recycle Bin | All soft-deleted entries</h1>
    <hr>

	<?php
	$read_query = "SELECT m.destination_id, m.destination_name, m.date_deleted,
                          c.country_name 
                   FROM airport.destinations as m 
                   JOIN airport.countries as c ON c.country_id = m.country_id
                   WHERE m.date_deleted IS NOT NULL ";
	//$read_query = "SELECT * FROM contact_form.messages WHERE date_deleted IS NOT NULL ORDER BY date_deleted DESC";
	$result = mysqli_query($connection, $read_query);

	if (mysqli_num_rows($result) > 0) { ?>
		<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Destination Name</th>
                    <th>Country Name</th>
                    <th>Date Deleted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
        <?php
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
                echo "<td>{$row['destination_id']}</td>";
                echo "<td>{$row['destination_name']}</td>";
                echo "<td>{$row['country_name']}</td>";
			    echo "<td>{$row['date_deleted']}</td>";
				echo "<td>
                    <a href='delete.php?destination_id={$row['destination_id']}' class='btn btn-sm btn-danger'>Delete</a>
                    <a href='restore.php?destination_id={$row['destination_id']}' class='btn btn-sm btn-success'>Restore</a>";
			    echo "</td>";
			echo "</tr>";
		}
		?>
		</tbody>
		</table>
        <br>
	<?php } else {
		echo "No matching results were found.";
		echo "<br><br>";
	}
    ?>
    <a href="index.php" class="btn btn-outline-dark">Back</a>
</div>

<?php

include ('partials/footer.php');
