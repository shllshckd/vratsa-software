<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

//1
$read_query = "SELECT recipe_id, recipe_name, date_deleted FROM recipes.`recipes` WHERE `date_deleted` IS NOT NULL";
$result = mysqli_query($connection, $read_query);

if (mysqli_num_rows($result)) { ?>
    <h2>Recycle Bin</h2>
    <table style="margin-left: 50px" class="table table-striped">
        <tr>
            <td>#</td>
            <td>Recipe ID</td>
            <td>Recipe Name</td>
            <td>Date</td>
            <td>Permanent Delete</td>
            <td>Restore</td>
        </tr>

		<?php
		$num = 1;
		while ($row = mysqli_fetch_assoc($result)) {
			?>
            <tr>
                <td><?= $num++ ?></td>
                <td><?= $row['recipe_id'] ?></td>
                <td><?= $row['recipe_name'] ?></td>
                <td><?= $row['date_deleted'] ?></td>
                <td><a href="delete.php?id=<?= $row['recipe_id'] ?>" class="btn btn-danger">Permanent&nbsp;Delete</a>
                </td>
                <td><a href="restore.php?id=<?= $row['recipe_id'] ?>" class="btn btn-success">Restore</a></td>
            </tr>
        <?php } ?>
    </table>
<?php }

include '../../includes/footer.php';
