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
	$filter .= " AND m.runner_first_name like '%$msg_name%' ";
}
if (!empty($_GET['message_comps'])) {
	$msg_comps = $_GET['message_comps'];
	$filter .= " AND m.runner_competitions_won_count = $msg_comps ";
}

$get_total_records_query = "SELECT COUNT(*) as count FROM runners.runners AS m WHERE (date_deleted IS NULl $filter)";
$result_query = mysqli_query($connection, $get_total_records_query);

$total_rows = mysqli_fetch_array($result_query);
$total_rows = $total_rows[0];

// offset was here

// descending ascending ordering
$order = '';
$order_param = 'runner_first_name';
if (!empty($_GET['order_option_names'])) {
	$order = $_GET['order_option_names'];
	$order_param = 'runner_first_name';
}
if (!empty($_GET['order_option_comps'])) {
	$order = $_GET['order_option_comps'];
	$order_param = 'runner_competitions_won_count';
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

<div class="container fluid padding">
    <h1>CRUD</h1>
    <h2>All entries</h2>
    <a href="create.php" class="btn btn-success">Create</a>
    <a href="recycle.php" class="btn btn-secondary">Recycle Bin</a>
    <br><br>

    <?php
    // get the entity, it's products and it's categories
    $read_query = "SELECT m.runner_id, m.runner_first_name, m.runner_last_name, m.runner_competitions_won_count, m.date_created as runner_date_created,
                        s.style_id, s.style_name, s.style_description, s.style_meters_long
                    FROM runners.runners AS m
                    join runners.styles AS s on m.runner_style_id = s.style_id
                    WHERE m.date_deleted  IS NULL $filter $pagination_string_ordering";
    $result = mysqli_query($connection, $read_query);

    if (mysqli_num_rows($result) > 0) { ?>
        <table class='table table-bordered'>
            <thead>
            <tr>
            <div class="form-group col-lg-4">
                <form action="index.php" method="get" accept-charset="utf-8">
                    <div class="input-group-prepend">
                        <input class="form-control" type="text" name="message_name" id="message_name" placeholder="Search by first name">
                        <input class="btn btn-outline-dark" type="submit" value="Apply">
                    </div>
                    <div class="input-group-prepend">
                        <input class="form-control" type="text" name="message_comps" id="message_comps" placeholder="Search by competitions won">
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
                        <select class="form-control" name="order_option_comps">
                            <option value="asc">Ascending order - competitions won</option>
                            <option value="desc">Descending order - competitions won</option>
                            <input class="btn btn-outline-dark" type="submit" value="Apply">
                        </select>
                    </div>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Competitions Won Count</th>
                    <th>Style Name</th>
                    <th>Style Description</th>
                    <th>Style Meters Long</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </form>
            </div>
        </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>{$row['runner_id']}</td>";
			    echo "<td>{$row['runner_first_name']}</td>";
			    echo "<td>{$row['runner_last_name']}</td>";
                echo "<td>{$row['runner_competitions_won_count']}</td>";
                echo "<td>{$row['style_name']}</td>";
			    echo "<td>{$row['style_description']}</td>";
			    echo "<td>{$row['style_meters_long']}</td>";
			    echo "<td>{$row['runner_date_created']}</td>";
			    echo "<td>
                    <a href='update.php?message_id={$row['runner_id']}' class='btn btn-sm btn-info'>Update</a>
                    <a href='soft_delete.php?message_id={$row['runner_id']}' class='btn btn-sm btn-warning'>Soft&nbsp;Delete</a>
                </td>";
            echo "</tr>";
        }
		?>
        </tbody>
        </table>
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
