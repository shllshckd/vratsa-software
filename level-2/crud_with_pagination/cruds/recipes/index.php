<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

$results_per_page = 5;

if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
else {
    $page = 1;
}

$filter = '';
$filters_link_for_pagination = '';

if (!empty($_GET['recipe_name'])) {
	$filter = ' AND a.recipe_name like \'%' . $_GET['recipe_name'] . '%\'';
}

if (!empty($_GET['prep_description'])) {
	$filter = $filter . ' AND a.prep_description like \'%' . $_GET['prep_description'] . '%\'';
}

$get_total_records_query = "SELECT COUNT(recipe_id) as count FROM recipes.recipes a where  date_deleted is null $filter";
$result = mysqli_query($connection, $get_total_records_query);
$total_rows = mysqli_fetch_array($result);
$total_rows = $total_rows[0];
$offset = ($page - 1) * $results_per_page;

$pagination_string = '';

if ($total_rows > $results_per_page) {
	$pagination_string = " ORDER BY a.recipe_name LIMIT $results_per_page OFFSET $offset";
}

$read_query = "SELECT a.recipe_id, a.recipe_name, a.prep_description, a.prep_time, b.recipe_category_name, a.date_created 
               FROM recipes.recipes a LEFT JOIN recipes.recipe_categories b on a.recipe_category_id = b.recipe_category_id 
               WHERE a.date_deleted IS NULL $pagination_string";

$max_pages = ceil($total_rows / $results_per_page );
// var_dump( mysqli_fetch_all($result, MYSQLI_ASSOC));
// die();

if (mysqli_num_rows($result) > 0) { ?>
    <h1>Recipes list | <span><a href="create.php" class="btn btn-info">Add New Recipe</a></span> |
        <a href="recycle_bin.php" class="btn btn-outline-dark">Recycle Bin</a></h1>
<!--    <input type="text" name="filter" value="" placeholder="Enter Keyword">-->
<!--    <input type="submit" name="submit" value="Apply">-->
    <table style="margin-left: 50px" class="table table-striped">
        <tr>
            <form action="index.php" method="get" accept-charset="utf-8">
                <td>#</td>
                <td>
                    <input type="text" name="recipe_name" value="" placeholder="Recipe Name">
                </td>
                <td>
                    <input type="text" name="prep_description" value="" placeholder="Preparation">
                    <input type="submit" value="Apply">
                </td>
                <td>Time</td>
                <td>Category</td>
                <td>Created At</td>
                <td>Update</td>
                <td>Soft Delete</td>
            </form>
        </tr>
		<?php
		$num = 1;
		while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $num++ ?></td>
                <td>
                    <a href="view.php?id=<?= $row['recipe_id']?>&name=<?= $row['recipe_name']?>" >
						<?= $row['recipe_name']?>
                    </a>
                </td>
                <td><?= $row['prep_description'] ?></td>
                <td><?= $row['prep_time'] ?></td>
                <td><?= $row['recipe_category_name'] ?></td>
                <td><?= $row['date_created'] ?></td>
                <td><a href="update.php?id=<?= $row['recipe_id'] ?>" class="btn btn-warning">Update</a></td>
                <td><a href="soft_delete.php?id=<?= $row['recipe_id'] ?>" class="btn btn-danger">Soft&nbsp;Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <p>
        <?php
		    $disabled_or_not = ($page == 1) ? 'disabled' : '';
		    if ($page > 1) { ?>
                <a class="btn btn-sm btm-primary <?php echo $disabled_or_not; ?>"
                   href="index.php?page=<?php echo $page - 1; ?>">Previous</a>
			<?php } else { ?>
                <a class="btn btn-sm btm-primary <?php echo $disabled_or_not; ?>"
                   href="index.php?page=1">Previous</a>
            <?php }
        echo "<span> | </span>";
            for ($i = 1; $i <= $max_pages; $i++) {
                echo "<a class=\"btn btn-sm btn-primary\" href='index.php?page=$i'>$i</a>";
            }

		    $disabled_or_not_for_next = ($page >= $max_pages) ? 'disabled' : '';
		    if ($page < $max_pages) { ?>
                <a class="btn btn-sm btm-primary <?php echo $disabled_or_not_for_next; ?>"
                   href="index.php?page=<?php echo $page + 1; ?>">Next</a><span> | </span>
            <?php } else { ?>
                <a class="btn btn-sm btm-primary <?php echo $disabled_or_not_for_next; ?>"
                   href="index.php?page=<?php echo $page; ?>">Next</a>
            <?php }
		?>
    </p>
<?php } else {
	die('Query has failed. ' . mysqli_error($connection));
}
