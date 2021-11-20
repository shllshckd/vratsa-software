<?php

print "<table border='1'>";

for($m = 0; $m < 4; $m++) {
    print "<tr>";

    for($n = 0; $n < 6; $n++) {
        print "<td>$m - $n</td>";
    }

    print "</tr>";
}

print "<table>";
