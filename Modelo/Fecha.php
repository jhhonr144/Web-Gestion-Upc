<?php

$d1 = date("d");
$m1 = date("m");
$a1 = date("Y");
$f1 = $d1 + $m1 * 30 + $a1 * 360;
$d = explode("-", $fin);
$f2 = $d[2] + $d[1] * 30 + $d[0] * 360;
if ($f1 > $f2) {
    $Activo = false;
    $resta = 'Cerrado';
} else {
    $Activo = true;
    $resta = $f2 - $f1;
}
?>