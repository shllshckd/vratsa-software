<?php

$var = 0 ;
// $var= 40;
// $var = 42;
// $var = 0;

if ($var <= 0) {
    echo "$var is invalid input. Input cannot be $var. <br>";
    return;
}
else if ($var % 3 == 0 ) {
    echo "$var is divisible by 3. <br>";
}
if ($var % 5 == 0) {
    echo "$var is divisible by 5. <br>";
}
if ($var % 7 == 0) {
    echo "$var is divisible by 7. <br>";
}

// switch ($var) {
//     case $var == 0:
//         echo "a zero";
//         return;
//         break;

//     default:
//         # code...
//         break;
// }
