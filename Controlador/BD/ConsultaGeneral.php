<?php
include_once $cone . 'conecion.php';
$conexion = new conecion(); 
/*
$bdDato
$bdTabla
$bdCondicion='""'
 */
if(!isset($retorna))$retorna="";
if($retorna==""){
$Consulta = $conexion->Guardame()->prepare('Select '.$bdDato.' from '.$bdTabla.'  '.$bdCondicion);
$Consulta->execute(); 
}else{
    $retorna = $conexion->Guardame()->prepare('Select '.$bdDato.' from '.$bdTabla.'  '.$bdCondicion);
$retorna->execute(); 
}
?>