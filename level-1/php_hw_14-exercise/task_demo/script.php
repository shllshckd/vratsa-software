<?php

session_start();

if (!isset($_SESSION['sum'])){
    $_SESSION['number'] = 0;
}

$number = $_POST['number'];
$_SESSION['sum'] += $number;

header('Location: index.php');
