<?php
session_start(); 
$_SESSION = array(); 
 SESSION_destroy(); 
 $bdHacer=' Estado="off" ';
$bdTabla="inicioa";
$bdCondicion=''; 
$cone="./../../Modelo/";
include './../../Controlador/BD/ActualizarEstudiante.php';
 $url = './..';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    die; 
?>