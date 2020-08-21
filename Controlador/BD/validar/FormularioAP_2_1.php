<?php
$cc = filter_input(INPUT_GET, 'cc', FILTER_SANITIZE_SPECIAL_CHARS);
$p1 = filter_input(INPUT_GET, 'a1', FILTER_SANITIZE_SPECIAL_CHARS);
$p2 = filter_input(INPUT_GET, 'a2', FILTER_SANITIZE_SPECIAL_CHARS);
$p3 = filter_input(INPUT_GET, 'a3', FILTER_SANITIZE_SPECIAL_CHARS);
$p4 = filter_input(INPUT_GET, 'a4', FILTER_SANITIZE_SPECIAL_CHARS);
$p5 = filter_input(INPUT_GET, 'a5', FILTER_SANITIZE_SPECIAL_CHARS);
$p6 = filter_input(INPUT_GET, 'a6', FILTER_SANITIZE_SPECIAL_CHARS);
$p7 = filter_input(INPUT_GET, 'a7', FILTER_SANITIZE_SPECIAL_CHARS);
$p8 = filter_input(INPUT_GET, 'a8', FILTER_SANITIZE_SPECIAL_CHARS);
$p9 = filter_input(INPUT_GET, 'a9', FILTER_SANITIZE_SPECIAL_CHARS); 
$p10 = filter_input(INPUT_GET, 'a0', FILTER_SANITIZE_SPECIAL_CHARS);
$p11 = filter_input(INPUT_GET, 'a11', FILTER_SANITIZE_SPECIAL_CHARS);
$p12 = filter_input(INPUT_GET, 'a12', FILTER_SANITIZE_SPECIAL_CHARS);
$p13 = filter_input(INPUT_GET, 'a13', FILTER_SANITIZE_SPECIAL_CHARS);
$p14 = filter_input(INPUT_GET, 'a14', FILTER_SANITIZE_SPECIAL_CHARS);
$p15 = filter_input(INPUT_GET, 'a15', FILTER_SANITIZE_SPECIAL_CHARS);
$p16 = filter_input(INPUT_GET, 'a16', FILTER_SANITIZE_SPECIAL_CHARS);
$p17 = filter_input(INPUT_GET, 'a17', FILTER_SANITIZE_SPECIAL_CHARS);
$p18 = filter_input(INPUT_GET, 'a18', FILTER_SANITIZE_SPECIAL_CHARS);


$cone = "./../../../Modelo/";
$ip = $_SERVER['REMOTE_ADDR']; 

$bdDato = "id";
$bdTabla = "mformulario";
$bdCondicion = 'where cc="' . $cc . '" and estado="A" and N="4"';
include './../ConsultaGeneral.php';
$mf = 0;
foreach ($Consulta as $fila) {
    $mf = $fila['id'];
}
$bdHacer = 'estado="DESACTIVADO"';
$bdTabla = 'mformulario';
$bdCondicion = 'where id="' . $mf . '" and N="4"';
$mf=$mf+1;
include './../ActualizarEstudiante.php';
$bdDato = "id,cc,tipo,fecha,ip,estado,N";
$bdTabla = "mformulario";
$bdAgrega = "'" . $mf . "','" . $cc . "','AP',curdate(),'" . $ip . "','A','4'";
include './../AdicionarGeneral.php';
$bdDato = "user,mf,formu,p1,p2,p3,p4,p5,p6,p7,p8,p9";
$bdTabla = "dformulario";
$bdAgrega = "'" . $cc . "','" . $mf . "','4','" . $p1 . "','" . $p2 . "','" . $p3 . "','" . $p4 . "','"
        . $p5 . "','" . $p6 . "','" . $p7 . "','" . $p8 . "','" . $p9 . "'";
include './../AdicionarGeneral.php';          
       
         echo "<div class=".'"wizard-footer height-wizard"'."><p    class='btn btn-next btn-fill btn-success btn-wd btn-sm'  />Guardado!</p></div>";
    
         
    