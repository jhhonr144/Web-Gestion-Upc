<?php
$url = $_SERVER["REQUEST_URI"];
//borrar /Gestion/
//echo $url;
if ($url == '/Gestion/Vista/Estudiante/' or $url == '/Gestion/Vista/Estudiante/index.php') {
    $puntos = './../'; //probado en general 
} else {
    $d = explode("/", '0'.$url);
    if($d[2] == 'Controlador'){
        $puntos='./../../';
    } else {
    $puntos='./../';    
    }        
}
$menu = "./Menu/";
if(isset($p)){
    $usuario =  $p->getNombre();
}else{
    $usuario =  "NELL";
}
    
$titulo = "UPC - Ayudas Sociales";
##FOTOS
$foto = "./../assets/img/";
$logo = "General/logo.png";
##BD
$bd="./../../Controlador/BD/";
$cone='./../'.$puntos.'Modelo/';

?>