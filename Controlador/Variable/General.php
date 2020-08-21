<?php
$url = $_SERVER["REQUEST_URI"];
//borrar /Gestion/
//echo $url;
if ($url == '/Gestion/Vista/General/' or $url == '/Gestion/Vista/General/index.php') {
    $puntos = '../'; //probado en general 
} else {
    $d = explode("/", '0'.$url);
    if($d[2] == 'Controlador'){
        $puntos='../../';
    } else {
    $puntos='../';    
    }        
}
$menu = "./../Plantilla/Menu/";
$titulo = "UPC - Ayudas Sociales";
$usuario = "UPC - Ayudas Sociales";
##FOTOS
$foto = "./../assets/img/";
$logo = "General/logo.png";
##BD
$bd="./../../Controlador/BD/";
$cone='./../'.$puntos.'Modelo/';
?>