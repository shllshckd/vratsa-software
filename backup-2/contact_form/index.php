<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

// paging stuff
$results_per_page = 4;
if (isset($_GET['page'])) { $page = $_GET['page']; }
else { $page = 1; }

// filtering stuff
$filter = '';
$filters_link_for_pagination = '';
if (!empty($_GET['message_name'])) {
    $msg_name = $_GET['message_name'];
	$filter .= " AND m.name like '%$msg_name%'";
}
if (!empty($_GET['message_email'])) {
	$msg_email = $_GET['message_email'];
	$filter .= " AND m.email like '%$msg_email%'";
}

//if (!empty($_GET['prep_description'])) {
//	$filter = $filter . ' AND a.prep_description like \'%' . $_GET['prep_description'] . '%\'';
//}

$get_total_records_query = "SELECT COUNT(*) as count FROM contact_form.messages a WHERE (deleted_at IS NULl $filter)";
$result = mysqli_query($connection, $get_total_records_query);

$total_rows = mysqli_fetch_array($result);
$total_rows = $total_rows[0];
$offset = ($page - 1) * $results_per_page;

$pagination_string = '';
if ($total_rows > $results_per_page) {
	$pagination_string = " ORDER BY message_id LIMIT $results_per_page OFFSET $offset";
}

$max_pages = ceil($total_rows / $results_per_page );

//$read_query = "SELECT a.recipe_id, a.recipe_name, a.prep_description, a.prep_time, b.recipe_category_name, a.date_created
//               FROM recipes.recipes a LEFT JOIN recipes.recipe_categories b on a.recipe_category_id = b.recipe_category_id
//               WHERE a.date_deleted IS NULL $pagination_string";

?>

<div class="container fluid padding">
    <h1>Contact form</h1>
    <h2>All messages</h2>
    <a href="create.php" class="btn btn-success">Create</a>
    <a href="recycle.php" class="btn btn-secondary">Recycle Bin</a>
    <br><br>

    <?php
    $read_query = "SELECT m.message_id, m.name, m.email, m.phone, m.message, m.created_at, p.product_name, p.product_description, c.category_name 
                   FROM contact_form.messages as m 
                   JOIN contact_form.products as p ON m.product_id = p.id
                   JOIN contact_form.categories as c on p.product_category_id = c.category_id
                   WHERE m.`deleted_at` IS NULL $pagination_string $filter";
    $result = mysqli_query($connection, $read_query);

    if (mysqli_num_rows($result) > 0)
    {
        echo "<table class='table table-bordered'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Id</th>";
                ?>
                <form action="index.php" method="get" accept-charset="utf-8">
                    <th>
                        <label for="message_name">Name</label>
                        <input type="text" name="message_name" id="message_name" placeholder="Message Name">
                        <input class="btn btn-sm btn-outline-dark m-1" type="submit" value="Apply">
                    </th>
                    <th>
                        <label for="message_email">Email</label>
                        <input type="text" name="message_email" id="message_email" placeholder="Message Email">
                        <input class="btn btn-sm btn-outline-dark m-1" type="submit" value="Apply">
                    </th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Category Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </form>
        <?php
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
        ?>
        <p>
        <?php
            // paging
		    $disabled_or_not_for_previous = ($page == 1) ? 'disabled' : '';
		    if ($page > 1) { ?>
                <a class="btn btn-sm btm-primary <?php echo $disabled_or_not_for_previous; ?>" href="index.php?page=<?php echo $page - 1; ?>"><-Previous</a>
			<?php } else { ?>
                <a class="btn btn-sm btm-primary <?php echo $disabled_or_not_for_previous; ?>" href="index.php?page=1"><- Previous</a>
            <?php }
            for ($i = 1; $i <= $max_pages; $i++) {
                echo "<a class=\"btn btn-sm btn-outline-dark\" href='index.php?page=$i'>$i</a>";
            }
		    $disabled_or_not_for_next = ($page >= $max_pages) ? 'disabled' : '';
		    if ($page < $max_pages) { ?>
                <a class="btn btn-sm btm-primary <?php echo $disabled_or_not_for_next; ?>"
                   href="index.php?page=<?php echo $page + 1; ?>">Next -></a>
            <?php } else { ?>
                <a class="btn btn-sm btm-primary <?php echo $disabled_or_not_for_next; ?>"
                   href="index.php?page=<?php echo $page; ?>">Next -></a>
            <?php }
		    // paging end
		?>
    </p>
	<?php } else {
        echo "Няма намерени резултати.";
    } ?>
</div>

<?php

include ('partials/footer.php');

?>
