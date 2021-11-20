<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

// original value, we will need it later
$id = $_GET['id'];

$query = "SELECT * FROM `academy`.`towns` WHERE `TownID` = {$id}";

$result = mysqli_query($connection, $query);
$message = mysqli_fetch_assoc($result);

?>

<div class="container fluid padding">
<h1>Update Town with ID - <?= $id ?></h1>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="TownID">TownID: </label>
            <input id="TownID" type="text" name="TownID" value="<?= $message['TownID'] ?>" class="form-control">
        </div>
        <div>
            <label for="Name">Name: </label>
            <input id="Name" type="text" name="Name" value="<?= $message['Name'] ?>" class="form-control">
        </div>
        <br>
        <input type="hidden" name="id_original" value="<?= $id ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>