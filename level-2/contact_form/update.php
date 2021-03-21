<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

$message_id = $_GET['message_id'];
$datetime = date('Y-m-d H:i:s');

$get_message_query = "SELECT * FROM messages WHERE message_id = $message_id";

$result = mysqli_query($connection, $get_message_query);
$message = mysqli_fetch_assoc($result);

?>

<div class="container fluid padding">
<h1>Update message with ID <?= $message['message_id'] ?></h1>

    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="name">Name: </label>
            <input id="name" type="text" name="name" value="<?= $message['name'] ?>" class="form-control">
        </div>

        <div>
            <label for="email" >Email: </label>
            <input id="email" type="text" name="email" value="<?= $message['email'] ?>" class="form-control">
        </div>
        <div>
            <label for="phone">Phone: </label>
            <input id="phone" type="text" name="phone" value="<?= $message['phone'] ?>" class="form-control">
        </div>

        <div>
            <label for="message">Message: </label>
            <input id="message" type="text" name="message" value="<?= $message['message'] ?>" class="form-control">
        </div>

        <br>
        <input type="hidden" name="message_id" value="<?= $message['message_id'] ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>