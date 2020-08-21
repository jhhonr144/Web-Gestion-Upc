<?php 
$titulo = filter_input(INPUT_GET, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
$foto = filter_input(INPUT_GET, 'foto', FILTER_SANITIZE_SPECIAL_CHARS);
$texto = filter_input(INPUT_GET, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
$fecha = filter_input(INPUT_GET, 'fecha', FILTER_SANITIZE_SPECIAL_CHARS);    
$fecha = filter_input(INPUT_GET, 'fecha1', FILTER_SANITIZE_SPECIAL_CHARS);    
$on= filter_input(INPUT_GET, 'para', FILTER_SANITIZE_SPECIAL_CHARS);    
if ($on == "true") {//actividad
    ####################################################
    $cone = "./../../../Modelo/";        
    $bdDato = "tipo,dia,nombre,informacion,qpublica,estado,Foto";
    $bdTabla = "actividades";
    $bdAgrega = "'AP','".$fecha."','".$titulo."','".$texto."','000','A','".$foto."'";
    include './../AdicionarGeneral.php'; 
    echo "Agregado";

    ####################################################
}else {
     ####################################################
   $cone = "./../../../Modelo/";        
    $bdDato = "Estado,Nombre,Texto,Foto,Publica,Para,FInicio,FFinal";
    $bdTabla = "convocatoria";
    $bdAgrega = "'A','".$titulo."','".$texto."','".$foto."','Admin','AP','".$fecha."','".$fecha1."'";
    include './../AdicionarGeneral.php'; 
    echo "Agregado";

    ####################################################
}

