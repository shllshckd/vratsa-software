<?php

/**
 * @var object $connection
 */
include('../../partials/header.php');

$query = "SELECT * FROM `recipes`.`units` WHERE `date_deleted` is null";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) { ?>
    <h1>Units List | <a href="create.php" class="btn btn-info">Add New Unit</a>
        <a href="recycle_bin.php" class="btn btn-outline-dark">Soft Deleted Units</a></h1>
    <table style="margin-left: 50px" class="table table-stripped">
        <tr>
            <td>#</td>
            <td>Unit Name</td>
            <td>Update</td>
            <td>Soft Delete</td>
        </tr>
    <?php
    $num = 1;
	while ($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td><?= $num++; ?></td>
			<td><?= $row['unit_name'] ?></td>
			<td><a href="update.php?id=<?= $row['unit_id'] ?>" class="btn btn-info">Update</a></td>
            <td><a href="soft_delete.php?id=<?= $row['unit_id'] ?>" class="btn btn-warning">Delete</a></td>
        </tr>
    <?php } ?>
    </table>
<?php } else {
	exit('Query has failed. ' . mysqli_error($connection));
}

include ('../../partials/footer.php');
