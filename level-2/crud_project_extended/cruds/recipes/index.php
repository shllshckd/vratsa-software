<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

//1
$read_query = "SELECT a.recipe_id, a.recipe_name, a.prep_description, a.prep_time, b.recipe_category_name, a.date_created 
               FROM recipes.recipes a LEFT JOIN recipes.recipe_categories b on a.recipe_category_id = b.recipe_category_id 
               WHERE a.date_deleted IS NULL";

$result = mysqli_query($connection, $read_query);

// var_dump( mysqli_fetch_all($result, MYSQLI_ASSOC));
// die();

if (mysqli_num_rows($result) > 0) { ?>
    <h1>Recipes list | <span><a href="create.php" class="btn btn-info">Add New Recipe</a></span> |
        <a href="recycle_bin.php" class="btn btn-outline-dark">Recycle Bin</a></h1>
    <table style="margin-left: 50px" class="table table-striped">
        <tr>
            <td>#</td>
            <td>Recipe Name</td>
            <td>Preparation</td>
            <td>Time</td>
            <td>Category</td>
            <td>Created At</td>
            <td>Update</td>
            <td>Soft Delete</td>
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
<?php } else {
	die('Query has failed. ' . mysqli_error($connection));
}
