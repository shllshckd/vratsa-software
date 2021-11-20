<?php

/**
 * @var object $connection
 */
include('partials/database_connection.php');
include('partials/header.php');

// original value, we will need it later
$project_id_original = $_GET['id'];

$query = "SELECT * FROM academy.projects WHERE ProjectID = '$project_id_original'";

$result = mysqli_query($connection, $query);
$message = mysqli_fetch_assoc($result);

?>

<div class="container fluid padding">
<h1>Update Project with ID - <?= $project_id_original ?></h1>
    <form action="update_two.php" method="post" accept-charset="utf-8">
        <div>
            <label for="ProjectID">Project ID: </label>
            <input id="ProjectID" type="text" name="ProjectID" value="<?= $message['ProjectID'] ?>" class="form-control">
        </div>
        <div>
            <label for="Name">Name: </label>
            <input id="Name" type="text" name="Name" value="<?= $message['Name'] ?>" class="form-control">
        </div>
        <div>
            <label for="Description">Description: </label>
            <input id="Description" type="text" name="Description" value="<?= $message['Description'] ?>" class="form-control">
        </div>
        <div>
            <label for="StartDate">Start Date: </label>
            <input id="StartDate" type="text"
                   name="StartDate" value="<?= $message['StartDate'] ?>" class="form-control">
        </div>
        <div>
            <label for="EndDate">End Date: </label>
            <input id="EndDate" type="text" name="EndDate" value="<?= $message['EndDate'] ?>" class="form-control">
        </div>
        <br>
        <input type="hidden" name="project_id_original" value="<?= $project_id_original ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
</div>