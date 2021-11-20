<?php

$name = $_POST['name'];
$town = $_POST['town'];

if (isset($_POST['name']) && isset($_POST['town'])) {
    echo "$name, твоят любим град е $town";
    echo "<br>";
    echo "<a href=\"hw_3.html\">Върни се</a>";
    return;
} elseif (!isset($_POST['name']) || !isset($_POST['town'])) {
    echo "Неправилно подадени данни.";
    echo "<br>";
    echo "<a href=\"hw_3.html\">Върни се</a>";
    return;
}

