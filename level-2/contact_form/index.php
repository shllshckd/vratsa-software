<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');
?>

<div class="container fluid padding">
    <h1>Contact form</h1>
    <h2>All messages</h2>
    <a href="create.php" class="btn btn-success">Create</a>
    <a href="recycle.php" class="btn btn-secondary">Recycle Bin</a>

    <br><br>

    <?php

    $read_query = "SELECT m.message_id, m.name, m.email, m.phone, m.message, m.created_at, p.product_name, p.product_description, c.category_name FROM contact_form.messages as m 
                   JOIN contact_form.products as p ON m.product_id = p.id
                   JOIN contact_form.categories as c on p.product_category_id = c.category_id
                   WHERE m.`deleted_at` IS NULL ORDER BY `created_at` DESC";

    $result = mysqli_query($connection, $read_query);

    if (mysqli_num_rows($result) > 0)
    {
        echo "<table class='table table-bordered'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Phone</th>";
                echo "<th>Message</th>";
		        echo "<th>Product Name</th>";
		        echo "<th>Product Description</th>";
                echo "<th>Product Category Name</th>";
		        echo "<th>Created At</th>";
                echo "<th>Actions</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>{$row['message_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['message']}</td>";
			    echo "<td>{$row['product_name']}</td>";
			    echo "<td>{$row['product_description']}</td>";
			    echo "<td>{$row['category_name']}</td>";
                echo "<td>{$row['created_at']}</td>";
                echo "<td>
                    <a href='update.php?message_id={$row['message_id']}' class='btn btn-sm btn-info'>Update</a>
                    <a href='soft_delete.php?message_id={$row['message_id']}' class='btn btn-sm btn-warning'>Soft&nbsp;Delete</a>
                </td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Няма намерени резултати.";
    } ?>
</div>

<?php

include ('partials/footer.php');
