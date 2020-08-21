<?php
include_once $cone . 'conecion.php';
$conexion = new conecion(); 
/*
 $bdDato   estado,nombre,apellido,cc,celular,carrera,correo,clave
$bdTabla
$bdAgrega='' 
*/
$Consulta = $conexion->Guardame()->prepare("INSERT INTO " . $bdTabla
            . "(".$bdDato.")"
            . " VALUES ( ". $bdAgrega ." )");
$Consulta->execute(); 
?>
