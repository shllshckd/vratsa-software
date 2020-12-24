<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hw task 5 - multiplication table</title>
<body>

<table border="1">

<?php

    for ($i = 1; $i <= 10; $i++) {

        print "<tr>";

        for ($j = 1; $j <= 10; $j++) {
            $result = $j * $i;

            if (($j >= 2 && $j <= 10) && $i == 1) {
                continue;
            } elseif (($j >= 3 && $j <= 10) && $i == 2) {
                continue;
            } elseif (($j >= 4 && $j <= 10) && $i == 3) {
                continue;
            } elseif (($j >= 5 && $j <= 10) && $i == 4) {
                continue;
            } elseif (($j >= 6 && $j <= 10) && $i == 5) {
                continue;
            } elseif (($j >= 7 && $j <= 10) && $i == 6) {
                continue;
            } elseif (($j >= 8 && $j <= 10) && $i == 7) {
                continue;
            } elseif (($j >= 9 && $j <= 10) && $i == 8) {
                continue;
            } elseif (($j == 10 ) && $i == 9) {
                continue;
            }

            print "<td colspan=\"1\">" . "$i * $j = $result" . "</td>";
        }

        print "</tr>";
    }

?>

</table>

</body>
</html>
