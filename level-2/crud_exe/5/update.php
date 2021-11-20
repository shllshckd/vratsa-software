<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

// original value, we will need it later
$id = $_GET['id'];

$query = "SELECT * FROM `academy`.`addresses` WHERE `AddressID` = {$id}";

$result = mysqli_query($connection, $query);
$message = mysqli_fetch_assoc($result);

// important! - use already existing TownID
?>

<div class="container fluid padding">
<h1>Update Address with ID - <?= $id ?></h1>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="AddressID">Address ID: </label>
            <input id="AddressID" type="text" name="AddressID" value="<?= $message['AddressID'] ?>" class="form-control">
        </div>
        <div>
            <label for="AddressText">Address Text: </label>
            <input id="AddressText" type="text" name="AddressText" value="<?= $message['AddressText'] ?>" class="form-control">
        </div>
        <div>
            <label for="TownID">Town ID: </label>
            <input id="TownID" type="text" name="TownID" value="<?= $message['TownID'] ?>" class="form-control">
        </div>

        <br>
        <input type="hidden" name="id_original" value="<?= $id ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>