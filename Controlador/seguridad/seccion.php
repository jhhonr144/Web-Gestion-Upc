<?php 
if(!isset($_SESSION)){
    SESSION_START(); 
}
include_once ("./../../Modelo/Persona.php");
if(!isset($p))$p = new Persona();
if(isset($_SESSION['persona'])){
    $p= unserialize($_SESSION['persona']);
    if($p->getTipo() == 'Admin') {
        include './../../Controlador/Redicionar/UPC.php';
    }
    if($p->getTipo() == 'Estudiante') {
         include './../../Controlador/Redicionar/UPC.php';
    } 
}else{
    include './../../Controlador/Redicionar/UPC.php'; 
}
include './../../Controlador/Redicionar/UPC.php'; 
    
?>