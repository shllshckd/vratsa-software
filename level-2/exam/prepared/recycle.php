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
	$read_query = "SELECT m.message_id, m.name, m.email, m.phone, m.message, m.date_created, m.date_deleted,
                          p.product_name, p.product_description, 
                          c.category_name
                   FROM contact_form.messages as m
                   JOIN contact_form.products as p ON m.product_id = p.id
                   JOIN contact_form.categories as c on p.product_category_id = c.category_id
                   WHERE m.date_deleted IS NOT NULL ORDER BY m.date_deleted DESC";
	//$read_query = "SELECT * FROM contact_form.messages WHERE date_deleted IS NOT NULL ORDER BY date_deleted DESC";
	$result = mysqli_query($connection, $read_query);

	if (mysqli_num_rows($result) > 0) { ?>
		<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Category Name</th>
                    <th>Created At</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
        <?php
		while ($row = mysqli_fetch_assoc($result)){
			echo "<tr>";
                echo "<td>{$row['message_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['message']}</td>";
                echo "<td>{$row['product_name']}</td>";
                echo "<td>{$row['product_description']}</td>";
                echo "<td>{$row['category_name']}</td>";
                echo "<td>{$row['date_created']}</td>";
			    echo "<td>{$row['date_deleted']}</td>";
				echo "<td>
                    <a href='delete.php?message_id={$row['message_id']}' class='btn btn-sm btn-danger'>Delete</a>
                    <a href='restore.php?message_id={$row['message_id']}' class='btn btn-sm btn-success'>Restore</a>";
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
