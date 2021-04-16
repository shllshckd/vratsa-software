<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

// paging stuff
$results_per_page = 5;
if (isset($_GET['page'])) { $page = $_GET['page']; }
else { $page = 1; }

// filtering stuff
$filter = '';
$filters_link_for_pagination = '';
if (!empty($_GET['message_username'])) {
    $usr_name = $_GET['message_username'];
	$filter .= " AND rr.username like '%$usr_name%'";
}
if (!empty($_GET['message_email'])) {
	$usr_email = $_GET['message_email'];
	$filter .= " AND rr.email like '%$usr_email%'";
}

$get_total_records_query = "SELECT COUNT(*) as count FROM clothing.rent_request AS rr WHERE (date_deleted IS NULL $filter)";
$result_query = mysqli_query($connection, $get_total_records_query);

$total_rows = mysqli_fetch_array($result_query);
$total_rows = $total_rows[0];
$offset = ($page - 1) * $results_per_page;

// desc asc ordering
if (!empty($_POST['order_option'])) {
	$order = $_POST['order_option'];
}

$pagination_string = '';
if ($total_rows > $results_per_page) {
	$pagination_string = " ORDER BY rr.id LIMIT $results_per_page OFFSET $offset";
}

$max_pages = ceil($total_rows / $results_per_page );

?>

<div class="container fluid padding">
    <h1>Clothes crud</h1>
    <h2>All messages</h2>
    <a href="create.php" class="btn btn-success">Create</a>
    <a href="recycle.php" class="btn btn-secondary">Recycle Bin</a>
    <br><br>

    <?php
    // get the entity, it's products and it's categories
    $read_query = "SELECT rr.id, rr.username, rr.email, rr.phone, rr.request_message, rr.national_clothing_id, rr.date_created,
                       nc.name as national_clothing_name,
                       nc.description as national_clothing_description,
                       nc.color as national_clothing_color
                   FROM clothing.rent_request AS rr
                   left JOIN clothing.national_clothing AS nc ON nc.id = rr.national_clothing_id
                   WHERE rr.`date_deleted` IS NULL $pagination_string $filter";
    $result = mysqli_query($connection, $read_query);

    if (mysqli_num_rows($result) > 0)
    {
        echo "<table class='table table-bordered'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>Id</th>"; ?>
                <form action="index.php" method="get" accept-charset="utf-8">
                    <th>
                        <label for="message_username">Username</label>
                        <input type="text" name="message_username" id="message_username" placeholder="Username">
                        <input class="btn btn-sm btn-outline-dark m-1" type="submit" value="Apply">
                    </th>
                    <th>
                        <label for="message_email">Email</label>
                        <input type="text" name="message_email" id="message_email" placeholder="Message Email">
                        <input class="btn btn-sm btn-outline-dark m-1" type="submit" value="Apply">
                    </th>
                    <th>Phone</th>
                    <th>Request Message</th>
                    <th>National Clothing Name</th>
                    <th>National Clothing Description</th>
                    <th>National Clothing Color</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </form>
        <?php
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['username']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['request_message']}</td>";
			    echo "<td>{$row['national_clothing_name']}</td>";
			    echo "<td>{$row['national_clothing_description']}</td>";
			    echo "<td>{$row['national_clothing_color']}</td>";
                echo "<td>{$row['date_created']}</td>";
                echo "<td>
                    <a href='update.php?id={$row['id']}' class='btn btn-sm btn-info'>Update</a>
                    <a href='soft_delete.php?id={$row['id']}' class='btn btn-sm btn-warning'>Soft&nbsp;Delete</a>
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
                <a class="btn btn-sm btm-primary <?= $disabled_or_not_for_previous; ?>"
                   href="index.php?page=<?= $page - 1; ?>"><-Previous</a>
			<?php } else { ?>
                <a class="btn btn-sm btm-primary <?= $disabled_or_not_for_previous; ?>"
                   href="index.php?page=1"><- Previous</a>
            <?php }

            for ($i = 1; $i <= $max_pages; $i++) {
                echo "<a class=\"btn btn-sm btn-outline-dark\" href='index.php?page=$i'>$i</a>";
            }

		    $disabled_or_not_for_next = ($page >= $max_pages) ? 'disabled' : '';
		    if ($page < $max_pages) { ?>
                <a class="btn btn-sm btm-primary <?= $disabled_or_not_for_next; ?>"
                   href="index.php?page=<?php echo $page + 1; ?>">Next -></a>
            <?php } else { ?>
                <a class="btn btn-sm btm-primary <?= $disabled_or_not_for_next; ?>"
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
