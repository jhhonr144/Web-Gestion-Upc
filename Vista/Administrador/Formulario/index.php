<?php
$urlp = $_SERVER["REQUEST_URI"]; 
if ($urlp == '/Gestion/Vista/Estudiante/Formulario/' || $urlp == '/Gestion/Vista/Estudiante/Formulario/index.php') {
    $url = './..';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    die;
}
if (!isset($_SESSION)) {
    SESSION_START();
}
include_once('./../../../Modelo/Persona.php');
$bd = "./../../../Controlador/BD/";
$cone = "./../../../Modelo/";
$p = new Persona();
$p = unserialize($_SESSION['persona']);

$cedula = filter_input(INPUT_GET, 'cedula', FILTER_SANITIZE_SPECIAL_CHARS);
$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);

$bdDato = 'count(*) tiene';
$bdTabla = 'mformulario';
$bdCondicion = 'where cc="' . $cedula . '" and tipo="' . $tipo . '" and estado="A"';
include ($bd . 'ConsultaGeneral.php');
foreach ($Consulta as $fila) {
    if ($fila['tiene'] == 0) {
        $url = './Formulario/formato.php?tipo=' . $tipo;
        echo '<meta http-equiv=refresh content="1; ' . $url . '">';
        die;
    }
}
$bdDato = "id";
include ($bd . 'ConsultaGeneral.php');
foreach ($Consulta as $fila) {
    $id = $fila['id'];
    break;
}
 $url = './Formulario/formato.php?tipo=' . $tipo ;
$urlp = $_SERVER["REQUEST_URI"];
if ($urlp == 'Gestion/Vista/Estudiante/Formulario/' || $urlp == '/Gestion/Vista/Estudiante/Formulario/index.php') {
    //$url = './formatoEditar.php?tipo=' . $tipo;
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    die;
} else {
   // $url = './Formulario/formatoEditar.php?tipo=' . $tipo;
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    die;
}
?>
