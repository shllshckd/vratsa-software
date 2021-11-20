<?php

/**
 * @var object $connection
 */
include '../../includes/header.php';

//1
$read_query = "SELECT * FROM recipes.`units` WHERE `date_deleted` IS NULL";

$result = mysqli_query($connection, $read_query);

if (mysqli_num_rows($result) > 0) {
	?>
    <h1>Units List | <span><a href="create.php" class="btn btn-info">Add New Unit</a></span> |
        <a href="recycle_bin.php" class="btn btn-outline-dark">Recycle Bin</a></h1>
    <table style="margin-left: 50px" class="table table-striped">
        <tr>
            <td>#</td>
            <td>Unit Name</td>
            <td>Update</td>
            <td>Soft delete</td>
        </tr>
		<?php
		$num = 1;
		while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $num++ ?></td>
                <td><?= $row['unit_name'] ?></td>
                <td><a href="update.php?id=<?= $row['unit_id'] ?>" class="btn btn-warning">Update</a></td>
                <td><a href="soft_delete.php?id=<?= $row['unit_id'] ?>" class="btn btn-danger">Soft Delete</a></td>
            </tr>
		<?php } ?>
    </table>

<?php } else {
	die('Query failed!' . mysqli_error($connection));
}

include '../../includes/footer.php';
