<?php
/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

// original value, we will need it later
$group_by_original = $_GET['group_by'];

$query = "SELECT * FROM northwind.sales_reports WHERE group_by = '$group_by_original'";
$result = mysqli_query($connection, $query);
$message = mysqli_fetch_assoc($result);

?>

<div class="container fluid padding">
<h1>Update Sale Report with ID - <?= $group_by_original ?></h1>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="group_by">Group By: </label>
            <input id="group_by" type="text" name="group_by" value="<?= $message['group_by'] ?>" class="form-control">
        </div>
        <div>
            <label for="display">Display: </label>
            <input id="display" type="text" name="display" value="<?= $message['display'] ?>" class="form-control">
        </div>
        <div>
            <label for="title">Title: </label>
            <input id="title" type="text" name="title" value="<?= $message['title'] ?>" class="form-control">
        </div>
        <div>
            <label for="filter_row_source">Filter Row Source: </label>
            <input id="filter_row_source" type="text"
                   name="filter_row_source" value="<?= $message['filter_row_source'] ?>" class="form-control">
        </div>
        <div>
            <label for="default">Default: </label>
            <input id="default" type="text" name="default" value="<?= $message['default'] ?>" class="form-control">
        </div>
        <br>
        <input type="hidden" name="group_by_original" value="<?= $group_by_original ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>