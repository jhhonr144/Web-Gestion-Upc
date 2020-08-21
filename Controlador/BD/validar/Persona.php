<?php
include ('./../../../Modelo/conecion.php');
$texto = "";
$int   = 0;
$bdDato='count(*) cuantos'; 
$bdTabla='estudiante';
$bdCondicion='where correo="'.$correo.'" or cc="'.$cedula.'"';
include ('./../ConsultaGeneral.php'); 
foreach ($Consulta as $fila) {
    if ($fila['cuantos'] == 0) {
        $int = 0;
    } else {
        $texto = "<p>Usted Ya esta Registrado<br>si no recuerda la clave "
                . "<a onclick='RecuperarClave(".$correo.",".$cedula.")'>precione aqui</a> </P>";
        $int=1;
        break;
    }
}
?>