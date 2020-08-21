<?php

if (!isset($_session)) {
    session_start();
}
$ip = $_SERVER['REMOTE_ADDR'];
$correo = filter_input(INPUT_GET, 'correo', FILTER_SANITIZE_SPECIAL_CHARS);
$clave = filter_input(INPUT_GET, 'clave', FILTER_SANITIZE_SPECIAL_CHARS);
include './../../Variable/General.php';
include './Secion.php';
if ($int === 0) {
    echo '<br><P style="color:red;">Clave invalida</p>';
    $url = './index.php';
    //echo '<meta http-equiv=refresh content="22; ' . $url . '">';//redicionar 
    die;
    return;
} $bdDato = '*';
$bdTabla = 'estudiante';
$bdCondicion = 'where  correo="' . $correo . '" and clave="' . $clave . '"';
include ('./../ConsultaGeneral.php');
include ('./../../../Modelo/Persona.php');
$p = new Persona();
$tipo="Estudiante";
foreach ($Consulta as $fila) {
    if($fila['cc'] == "000")$tipo="Administrador";
    $p->Cargar($tipo, $fila['nombre'] . ' ' . $fila['apellido'], $fila['cc'], $fila['celular'], $correo, $fila['clave'], "ACTIVO", $fila['estado']);
    $_SESSION['persona'] = serialize($p);
    echo "Bienvenido al Sistema UPC <br>" . $fila['nombre'];
    break;
}
//################################
//poner a guardar quien inicia
//###############################

if ($p->getCedula() == "000") {
    $bdDato = 'max(Id) id';
    $bdTabla = 'inicioa';
    $bdCondicion = 'where  Estado="off"';
    include ('./../ConsultaGeneral.php');
    foreach ($Consulta as $fila) {
    $bdDato="Id,Fecha,Hora,Ip";
    $bdTabla="inicioa";
    $bdAgrega=''. ($fila['id']+1) .',curdate(),curtime(),"'.$ip.'"';   
    include ('./../AdicionarGeneral.php');
    }
    include ("./../../redicionar/Administrador.php");
}
include ("./../../redicionar/Estudiante.php");
die;
?>