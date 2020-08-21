<?php
include ('./../../../Modelo/conecion.php');
$texto = "";
$int   = 0;
$bdDato='count(*) cuantos'; 
$bdTabla='estudiante';
$bdCondicion='where correo="'.$correo.'" and clave="'.$clave.'"';
include ('./../ConsultaGeneral.php'); 
foreach ($Consulta as $fila) {
    if ($fila['cuantos'] == 0) {
        $int = 0;
    } else { 
        $int=1;        
    }
    break;
}
?>