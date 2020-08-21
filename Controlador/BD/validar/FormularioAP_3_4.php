<?php
$cc = filter_input(INPUT_GET, 'cc', FILTER_SANITIZE_SPECIAL_CHARS);
$p1 = filter_input(INPUT_GET, 'a1', FILTER_SANITIZE_SPECIAL_CHARS);
$p2 = filter_input(INPUT_GET, 'a2', FILTER_SANITIZE_SPECIAL_CHARS);
$p3 = filter_input(INPUT_GET, 'a3', FILTER_SANITIZE_SPECIAL_CHARS); 
$p4 = filter_input(INPUT_GET, 'a4', FILTER_SANITIZE_SPECIAL_CHARS); 

$numero=8;
$cone = "./../../../Modelo/";
$ip = $_SERVER['REMOTE_ADDR']; 

$bdDato = "id";
$bdTabla = "mformulario";
$bdCondicion = 'where cc="' . $cc . '" and estado="A" and N="'.$numero.'"';
include './../ConsultaGeneral.php';
$mf = 0;
foreach ($Consulta as $fila) {
    $mf = $fila['id'];
}
$bdHacer = 'estado="DESACTIVADO"';
$bdTabla = 'mformulario';
$bdCondicion = 'where id="' . $mf . '" and N="'.$numero.'"';
$mf=$mf+1;
include './../ActualizarEstudiante.php';
$bdDato = "id,cc,tipo,fecha,ip,estado,N";
$bdTabla = "mformulario";
$bdAgrega = "'" . $mf . "','" . $cc . "','AP',curdate(),'" . $ip . "','A','".$numero."'";
include './../AdicionarGeneral.php';
$bdDato = "user,mf,formu,p1,p2,p3";
$bdTabla = "dformulario";
$bdAgrega = "'" . $cc . "','" . $mf . "','".$numero."','" . $p1 . "','" . $p2 . "','" . $p3 . "'";
include './../AdicionarGeneral.php';          
       
echo "<div class=".'"wizard-footer height-wizard"'."><p    class='btn btn-next btn-fill btn-success btn-wd btn-sm'  />Guardado!</p></div>";
    
         
    