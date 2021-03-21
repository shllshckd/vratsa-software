<?php include 'includes/functions.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 12</title>
</head>
<body>

<?php

if (isset($_POST)) {
    if (!empty($_POST['students'])) {
        print_table(['name', 'subjects', 'grades', 'average score'], $_POST['students']);
    }
}