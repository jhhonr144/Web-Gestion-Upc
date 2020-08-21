<?php
   $bdDato = 'Fecha,Hora';
    $bdTabla = 'inicioa';
    $bdCondicion = 'where Id=(
select max(Id)
from inicioa
where estado!="ON")';
    include ($bd . 'ConsultaGeneral.php');
    foreach ($Consulta as $fila) {
        $fecha=$fila['Fecha'];
        $hora=$fila['Hora'];
    }
    $tituloA="Ultimo inicio de sesion!";
    $textoA="El dia  ".$fecha."<br>en horas de".   $hora ;
    $imagenA="./../assets/img/rayo.jpg";
?>