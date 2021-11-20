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
$offset = ($page - 1) * $results_per_page;

// filtering stuff
$filter = '';
$filters_link_for_pagination = '';
if (!empty($_GET['message_name'])) {
    $msg_name = $_GET['message_name'];
	$filter .= " AND m.name like '%$msg_name%' ";
}
if (!empty($_GET['message_email'])) {
	$msg_email = $_GET['message_email'];
	$filter .= " AND m.email like '%$msg_email%' ";
}

$get_total_records_query = "SELECT COUNT(*) as count FROM contact_form.messages AS m WHERE (date_deleted IS NULl $filter)";
$result_query = mysqli_query($connection, $get_total_records_query);

$total_rows = mysqli_fetch_array($result_query);
$total_rows = $total_rows[0];

// offset was here

// descending ascending ordering emails and names
$order = '';
$order_param = 'name';
if (!empty($_GET['order_option_names'])) {
	$order = $_GET['order_option_names'];
	$order_param = 'name';
}
if (!empty($_GET['order_option_emails'])) {
	$order = $_GET['order_option_emails'];
	$order_param = 'email';
}

$pagination_string_ordering = '';
if ($total_rows > $results_per_page) {
	$pagination_string_ordering = " ORDER BY $order_param $order LIMIT $results_per_page OFFSET $offset";
}
//else { // for ordering to work when rows are a small count
//	$pagination_string_ordering = " ORDER BY $order_param $order LIMIT $results_per_page OFFSET $offset";
//}

$max_pages = ceil($total_rows / $results_per_page );
?>

<div class="container fluid padding p-3">
    <h1>CRUD - Index | All entries</h1>
    <hr>
    <a href="create.php" class="btn btn-success">Create</a>
    <a href="recycle.php" class="btn btn-secondary">Recycle Bin</a>
    <br><br>

    <?php
    // get the entities, their products and their categories
    $read_query = "SELECT m.message_id, m.name, m.email, m.phone, m.message, m.date_created, 
                          p.product_name, p.product_description,
                          c.category_name 
                   FROM contact_form.messages as m 
                   JOIN contact_form.products as p ON m.product_id = p.id
                   JOIN contact_form.categories as c on p.product_category_id = c.category_id
                   WHERE m.date_deleted IS NULL $filter $pagination_string_ordering";
    $result = mysqli_query($connection, $read_query);

    if (mysqli_num_rows($result) > 0) { ?>
        <table class='table table-bordered'>
            <thead>
            <tr>
            <div class="form-group col-lg-4">
                <form action="index.php" method="get" accept-charset="utf-8">
                    <div class="input-group-prepend">
                        <input class="form-control" type="text" name="message_name" id="message_name" placeholder="Search by name">
                        <input class="btn btn-outline-dark" type="submit" value="Apply">
                    </div>
                    <div class="input-group-prepend">
                        <input class="form-control" type="text" name="message_email" id="message_email" placeholder="Search by email">
                        <input class="btn btn-outline-dark" type="submit" value="Apply">
                    </div>
                    <div class="input-group-prepend">
                        <select class="form-control" name="order_option_names">
                            <option value="asc">Ascending order - names</option>
                            <option value="desc">Descending order - names</option>
                            <input class="btn btn-outline-dark" type="submit" value="Apply">
                        </select>
                    </div>
                    <div class="input-group-prepend">
                        <select class="form-control" name="order_option_emails">
                            <option value="asc">Ascending order - emails</option>
                            <option value="desc">Descending order - emails</option>
                            <input class="btn btn-outline-dark" type="submit" value="Apply">
                        </select>
                    </div>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Category Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </form>
            </div>
        </tr>
        </thead>
        <tbody>
        <?php
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
                echo "<td>{$row['date_created']}</td>";
                echo "<td>
                    <a href='update.php?message_id={$row['message_id']}' class='btn btn-sm btn-info'>Update</a>
                    <a href='soft_delete.php?message_id={$row['message_id']}' class='btn btn-sm btn-warning'>Soft&nbsp;Delete</a>
                </td>";
            echo "</tr>";
        }
		?>
        </tbody>
        </table>

        <script src="https://kit.fontawesome.com/c952ac5cde.js" crossorigin="anonymous"></script>
        <p>
        <?php
            // paging
		    $disabled_or_not_for_previous = ($page == 1) ? 'disabled' : '';
		    if ($page > 1) { ?>
                <a class="btn btn-sm btn-outline-dark <?= $disabled_or_not_for_previous; ?>"
                   href="index.php?page=<?= $page - 1; ?>"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Previous</a>
			<?php } else { ?>
                <a class="btn btn-sm btn-outline-dark <?= $disabled_or_not_for_previous; ?>"
                   href="index.php?page=1"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Previous</a>
            <?php }
            for ($i = 1; $i <= $max_pages; $i++) {
                echo "<a class=\"btn btn-sm btn-outline-dark\" href='index.php?page=$i'>$i</a>";
            }
		    $disabled_or_not_for_next = ($page >= $max_pages) ? 'disabled' : '';
		    if ($page < $max_pages) { ?>
                <a class="btn btn-sm btn-outline-dark <?= $disabled_or_not_for_next; ?>"
                   href="index.php?page=<?php echo $page + 1; ?>">Next&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></a>
            <?php } else { ?>
                <a class="btn btn-sm btn-outline-dark <?= $disabled_or_not_for_next; ?>"
                   href="index.php?page=<?php echo $page; ?>">Next&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></a>
            <?php }
		    // paging end
		?>
    </p>
	<?php } else {
        echo "No matching results were found.";
	}
    ?>
</div>

<?php

include ('partials/footer.php');

?>
