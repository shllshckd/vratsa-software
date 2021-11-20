<?php
/**
 * @var object $connection
 */
include('../../partials/connection.php');
include('../../partials/header.php');

$read_query = "SELECT * FROM `recipes`.`products` WHERE `date_deleted` is not null";
$result = mysqli_query($connection, $read_query);

if (mysqli_num_rows($result)) {
?>

<h1>Recycle Bin</h1>
<table style="margin-left: 50px" class="table table-stripped">
    <tr>
        <td>#</td>
        <td>Product</td>
        <td>Restore</td>
        <td>Permanent Delete</td>
    </tr>

    <?php
    $num = 1;
    while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $num++; ?></td>
            <td><?= $row['product_name'] ?></td>
            <td>
                <a href="restore.php?id=<?= $row['product_id'] ?>" class="btn btn-info">Restore</a>
            </td>
            <td>
                <a href="delete.php?id=<?= $row['product_id'] ?>" class="btn btn-danger">Delete Permanently</a>
            </td>
        </tr>
    <?php } ?>
</table>
<?php } ?>
