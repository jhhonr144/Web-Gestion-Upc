<?php

$url = $_SERVER["REQUEST_URI"];
//borrar /Gestion/
//echo $url;
if ($url == '/Gestion/Vista/Administrador/' or $url == '/Gestion/Vista/Administrador/index.php') {
    $puntos = './../'; //probado en general 
} else {
    $d = explode("/", '0' . $url);
    if ($d[2] == 'Controlador') {
        $puntos = './../../';
    } else {
        $puntos = './../';
    }
}
$menu = "./Menu/";
if (isset($p)) {
    $usuario = $p->getNombre();
} else {
    $usuario = "NELL";
}

$titulo = "UPC Admin";
##FOTOS
$foto = "./../assets/img/";
$logo = "General/logo.png";
##BD
$bd = "./../../Controlador/BD/";
$cone = './../' . $puntos . 'Modelo/';
##
$fecha_fin_semestre="2019-08-01";

$todos = 0;
$completo = 0;
//###########################
$bdDato = "count(*) total";
$bdTabla = "mformulario";
$bdCondicion = 'where estado="A"
                            group by cc';
include './../../Controlador/BD/ConsultaGeneral.php';
foreach ($Consulta as $fila) {
    $todos = $todos + 1;
}
//###########################
$bdDato = "*";
$bdTabla = "mformulario";
$bdCondicion = 'where estado="A" 
            group by cc,N 
            order by cc';
include './../../Controlador/BD/ConsultaGeneral.php';
$con = 0;
$cc = 0;
foreach ($Consulta as $fila) {
    if ($con == 0 || $cc == 0) {
        $cc = $fila['cc'];
    }
    if ($cc == $fila['cc']) {
        $con = $con + 1;
    } else {
        if ($con == 8) {
            $completo = $completo + 1;
        }
        $cc = $fila['cc'];
        $con = 0;
    }
}
if ($con == 8) {
    $completo = $completo + 1;
}
//########################
$bdDato = "count(*) c,dia";
$bdTabla = "inicioe";
$bdCondicion = 'group by user,dia
                order by dia desc
                limit 10';
include './../../Controlador/BD/ConsultaGeneral.php';
$vec_inicio=$Consulta; 
?>