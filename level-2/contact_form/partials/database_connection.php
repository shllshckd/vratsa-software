<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'contact_form';

$connection = mysqli_connect($server, $username, $password, $database);

if (!$connection) {
    //die
    exit('Connection failed.' . mysqli_connect_error() . ' Error Number: '. mysqli_connect_errno());
}
//else {
//    echo "Connected successfully to the database.";
//}
