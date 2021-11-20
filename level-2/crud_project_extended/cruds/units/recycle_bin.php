<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

$read_query = "SELECT * FROM recipes.`units` WHERE `date_deleted` IS NOT NULL";
$result = mysqli_query($connection, $read_query);

if (mysqli_num_rows($result)) { ?>
    <h2>Recycle Bin</h2>
    <table style="margin-left: 50px" class="table table-striped">
        <tr>
            <td>#</td>
            <td>Unit</td>
            <td>Permanent Delete</td>
            <td>Restore</td>
        </tr>
		<?php
		$counter = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			?>
            <tr>
                <td><?= ++$counter; ?></td>
                <td><?= $row['unit_name'] ?></td>
                <td><a href="delete.php?id=<?= $row['unit_id'] ?>" class="btn btn-danger">Permanent Delete</a></td>
                <td><a href="restore.php?id=<?= $row['unit_id'] ?>" class="btn btn-success">Restore</a></td>
            </tr>
        <?php } ?>
    </table>
<?php }

include '../../includes/footer.php';
