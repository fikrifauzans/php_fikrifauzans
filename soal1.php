<?php

$jml = $_GET['jml'];
echo "<table border=1>\n";
$c = $jml;
for ($a = $jml; $a > 0; $a--) {
    echo "<tr>";
    for ($e = $a; $e > 0; $e--) {
        $f += $e;
    }
    echo "<td colspan='$jml'>Jumlah : ($f)</td>";
    echo "</tr>";
    echo "<tr>\n ";
    for ($b = $a; $b > 0; $b--) {

        echo "<td>$b</td>";
    }
    echo "</tr>\n";
    $f = 0;
}
echo "</table>";
