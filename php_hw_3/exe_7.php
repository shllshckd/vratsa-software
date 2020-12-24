<?php

$age = 64;

switch ($age) {
    case $age < 0:
        echo "Not a valid age.";
        break;

    case $age <= 18:
        echo "Go to school.";
        break;

    case $age < 64:
        echo "Go to work.";
        break;
    
    case $age >= 64:
        echo "You are retired.";
        break;
    
    default:
        break;
}
