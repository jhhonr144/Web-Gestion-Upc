<html>
    <head>
        <title>Cargado Vistas</title>
<link rel="icon" type="image/jpg" href="./assets/img/General/icono.jpg">
    </head>
</html>
<?php 
if(!isset($_SESSION)){
    SESSION_START();  
}
include_once ("./../Modelo/Persona.php"); 
if(isset($_SESSION['persona']) ){
    $ya='false';
    $p= unserialize($_SESSION['persona']);
    if($p->getTipo() == 'Administrador') {
        $url = './Administrador/';
        echo '<meta http-equiv=refresh content="1; ' . $url . '">';
        die;
    }
    if($p->getTipo() == 'Estudiante') {
        $url = './Estudiante/';
        echo '<meta http-equiv=refresh content="1; ' . $url . '">';
        die; 
    } 
        $url = './General/';
        echo '<meta http-equiv=refresh content="1; ' . $url . '">';
        die;  
}else{ 
    $url = './General/';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    die; 
}  

?>