<?php
$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
echo $host."_".$url;
include_once $cone . 'conecion.php';
$conexion = new conecion(); 
//$bdHacer
//$bdTabla
//$bdCondicion='' 
$Consulta = $conexion->Guardame()->prepare('UPDATE  '.
        $bdTabla  .'  SET  '. $bdHacer  .'  '. $bdCondicion);
$Consulta->execute();
