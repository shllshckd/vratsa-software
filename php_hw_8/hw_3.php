<?php
//  3. Създайте двумерен масив с информация за име на човек, ръст, тегло. /5 човека/.
//
//  Изчислете индекс за телесна маса /ИТМ/ за всеки един оттях и го запазете в масива.
//
//  ИТМ = Тегло/Височина^2
//  a.Изчислете средното тегло на хората, за които пазите информация в масива.
//  b.Изчислете средния ръст на хората, за които пазите информация в масива.
//  c.Изчислете средната стойност на ИТМ на хората, за които пазите информация в масива

$people = [
    [
        'name' => 'Peter',
        'height' => 180,
        'weight' => 100,
    ],
    [
        'name' => 'Liam',
        'height' => 150,
        'weight' => 60,
    ],
    [
        'name' => 'Henry',
        'height' => 200,
        'weight' => 130,
    ],
    [
        'name' => 'Ethan',
        'height' => 175,
        'weight' => 70,
    ],
    [
        'name' => 'David',
        'height' => 173,
        'weight' => 73,
    ],
//    [
//        'name' => 'Ana',
//        'height' => 167,
//        'weight' => 47,
//    ],
];

//Average weight of all the people is: 80
//Average height of all the people is: 174.16666666667
//Average body mass index of all the people is: 0.0026373022595637

$average_weight_all_people = 0;
$average_height_all_people = 0;

// weight

foreach ($people as $person => $value) {
    $average_weight_all_people += $value['weight'];
}

$average_weight_all_people /= count($people);

print "Average weight of all the people is: $average_weight_all_people<br/>"; // 86.6

// height

foreach ($people as $person => $value) {
    $average_height_all_people += $value['height'];
}

$average_height_all_people /= count($people);

print "Average height of all the people is: $average_height_all_people<br/>"; // 175.6

// bmi

$body_mass_index = $average_weight_all_people / ($average_height_all_people ** 2);

print "Average body mass index of all the people is: $body_mass_index<br/>"; // ?
