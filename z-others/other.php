<?php

$family = [
    "Thom" => ["Roommate" => "Shane"],
    "Andy" => ["Cousin" => "Michelle", "Mother" => "Sophy"],
    "John" => ["Friend" => "Chan"],
];

foreach ($family as $key => $value) {
    foreach ($value as $relationship => $name) {
        echo "$key has a $relationship named $name" . "<br>";
    }
}

echo "<br>Numbers<br><br>";

$array2 = [
    [0, 1, 2, 3, 4, 5, 6],
    [6, 7, 8, 9, 10, 11, 12],
//    [13, 14, 15, 16, 17, 18, 19],
];

//for ($i = 0; $i < count($array2); $i++) {
//    for ($j = 0; $j < $array2[$i]; $j++) {
//        echo "$j <br>";
//    }
//}

foreach ($array2 as $rows => $singleArray) {
    foreach ($singleArray as $row => $inner_value) {
        echo "Row: $row - Value: $inner_value" . "<br>";
    }
}

$array3 = [
    "email_list_1" => [
        "Thom" => "thom@mail.bg",
        "Andy" => "andy@mail.bg",
        "John" => "john@mail.bg",
    ],
    "email_list_2" => [
        "Peter" => "peter@mail.bg",
        "Ana" => "ana@mail.bg",
        "Aaron" => "aaron@mail.bg",
    ]
];

echo "<br>Mails<br><br>";

foreach ($array3 as $list => $inner_array) {
    foreach ($inner_array as $person_name => $person_mail) {
        echo "$list - person name: $person_name - person mail: $person_mail <br>";
    }
}

echo "<br>Cars<br><br>";

$car_rows = 3;
$car_cols = 3;

$cars = [
    ["Volvo", 25, 18],
    ["BMW", 15, 13],
    ["Land Rover", 17, 15],
];

foreach ($cars as $row_number => $information) {
    foreach ($information as $key => $value) {
        echo "row number: $row_number - key: $key - $value <br>";
    }
}

echo "<br>";

for ($r = 0; $r < $car_rows; $r++) {
    for ($c = 0; $c < $car_cols; $c++) {
        echo $cars[$r][$c] . "<br>";
    }
}