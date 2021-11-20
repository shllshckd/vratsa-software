<?php
/**
 * @var object $connection
 */
include('../../partials/connection.php');
include('../../partials/header.php');

$read_query = "SELECT * FROM `recipes`.`units` WHERE `date_deleted` is not null";
$result = mysqli_query($connection, $read_query);

if (mysqli_num_rows($result)) {
?>

<h2>Recycle Bin</h2>
    <table style="margin-left: 50px" class="table table-stripped">
		<tr>
			<td>#</td>
			<td>Unit</td>
			<td>Permanent Delete</td>
			<td>Restore</td>
		</tr>
		<?php
		$num = 1;
		while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $num++; ?></td>
                <td><?= $row['unit_name'] ?></td>
                <td><a href="restore.php?id=<?= $row['unit_id'] ?>" class="btn btn-info">Restore</a></td>
                <td><a href="delete.php?id=<?= $row['unit_id'] ?>" class="btn btn-danger">Delete Permanently</a></td>
            </tr>
		<?php } ?>
	</table>
<?php } ?>

