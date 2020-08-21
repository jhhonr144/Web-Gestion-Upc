<?php

$p1 = filter_input(INPUT_GET, 'a1', FILTER_SANITIZE_SPECIAL_CHARS);
$p2 = filter_input(INPUT_GET, 'a2', FILTER_SANITIZE_SPECIAL_CHARS);
$p3 = filter_input(INPUT_GET, 'a3', FILTER_SANITIZE_SPECIAL_CHARS);
$p4 = filter_input(INPUT_GET, 'a4', FILTER_SANITIZE_SPECIAL_CHARS);
$p5 = filter_input(INPUT_GET, 'a5', FILTER_SANITIZE_SPECIAL_CHARS);
$p6 = filter_input(INPUT_GET, 'a6', FILTER_SANITIZE_SPECIAL_CHARS);
$p7 = filter_input(INPUT_GET, 'a7', FILTER_SANITIZE_SPECIAL_CHARS);
$p8 = filter_input(INPUT_GET, 'a8', FILTER_SANITIZE_SPECIAL_CHARS);
$p9 = filter_input(INPUT_GET, 'a9', FILTER_SANITIZE_SPECIAL_CHARS);
$p0 = filter_input(INPUT_GET, 'a0', FILTER_SANITIZE_SPECIAL_CHARS);
$b1 = filter_input(INPUT_GET, 'b1', FILTER_SANITIZE_SPECIAL_CHARS);
$b2 = filter_input(INPUT_GET, 'b2', FILTER_SANITIZE_SPECIAL_CHARS);
$b3 = filter_input(INPUT_GET, 'b3', FILTER_SANITIZE_SPECIAL_CHARS);
$b4 = filter_input(INPUT_GET, 'b4', FILTER_SANITIZE_SPECIAL_CHARS);
$b5 = filter_input(INPUT_GET, 'b5', FILTER_SANITIZE_SPECIAL_CHARS);
$b6 = filter_input(INPUT_GET, 'b6', FILTER_SANITIZE_SPECIAL_CHARS);
$b7 = filter_input(INPUT_GET, 'b7', FILTER_SANITIZE_SPECIAL_CHARS);
$cone = "./../../../Modelo/";
$ip = $_SERVER['REMOTE_ADDR'];
###Desativa si hay uno
$bdHacer = 'estado="DESACTIVADO"';
$bdTabla = 'mformulario';
$bdCondicion = 'where cc=' . $p4 . ' and tipo="AP" and N="1"';
include './../ActualizarEstudiante.php';

##si hay buscoo a cual hacer referencia
$bdDato = "max(id) x";
$bdTabla = "mformulario";
$bdCondicion = '';
include './../ConsultaGeneral.php';
$m = 0;
foreach ($Consulta as $fila) {
    $m = $fila['x'];
}$m++; 

$bdDato = "id,cc,tipo,fecha,ip,estado,N";
$bdTabla = "mformulario";
$bdAgrega = "'" . $m . "','" . $p4 . "','AP',curdate(),'" . $ip . "','A','1'";
include './../AdicionarGeneral.php';

$bdDato = "id";
$bdTabla = "mformulario";
$bdCondicion = 'where cc="' . $p4 . '" and estado="A" and N="1"';
include './../ConsultaGeneral.php';
$mf = 0;
foreach ($Consulta as $fila) {
    $mf = $fila['id'];
}
if ($p1 != "") {
    $f = explode("fakepath", $p1);
    $p1 = "foto/" . $f[1];
    move_uploaded_file($p1, "./../../../Vista/assets/img/Estudiante" . $f[1]);
} else {
    $bdDato = "p1";
    $bdTabla = "dformulario";
    $bdCondicion = 'where user="' . $p4 . '" and formu="1" and mf="' . ($m - 1) . '"';
    include './../ConsultaGeneral.php';
    foreach ($Consulta as $fila) {
        $p1 = $fila['p1'];
    }
}


$bdDato = "mf,user,formu,p1,p2,p3,p4,p5,p6,p7,p8,p9,p0,b1,b2,b3,b4,b5,b6,b7";
$bdTabla = "dformulario";
$bdAgrega = "'" . $mf . "','" . $p4 . "','1','" . $p1 . "','" . $p2 . "','" . $p3 . "','" . $p4 . "','"
        . $p5 . "','" . $p6 . "','" . $p7 . "','" . $p8 . "','" . $p9 . "','" . $p0 . "','" . $b1 . "','"
        . $b2 . "','" . $b3 . "','" . $b4 . "', '" . $b5 . "','" . $b6 . "','" . $b7 . "'";
include './../AdicionarGeneral.php';
echo "<div class=" . '"wizard-footer height-wizard"' . "><p    class='btn btn-next btn-fill btn-success btn-wd btn-sm'  />Guardado!</p></div>";
