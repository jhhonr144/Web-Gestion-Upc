<?php

if (!isset($_session)) {
    session_start();
}
$ip = $_SERVER['REMOTE_ADDR'];
// nombre+apellido+correo+clave+cedula+celular+carrera
$nombre = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
$cedula = filter_input(INPUT_GET, 'cedula', FILTER_SANITIZE_SPECIAL_CHARS);
$tele = filter_input(INPUT_GET, 'celular', FILTER_SANITIZE_SPECIAL_CHARS);
$correo = filter_input(INPUT_GET, 'correo', FILTER_SANITIZE_SPECIAL_CHARS);
$carrera = filter_input(INPUT_GET, 'carrera', FILTER_SANITIZE_SPECIAL_CHARS);
$clave = filter_input(INPUT_GET, 'clave', FILTER_SANITIZE_SPECIAL_CHARS);
$apellido = filter_input(INPUT_GET, 'apellido', FILTER_SANITIZE_SPECIAL_CHARS);
include './../../Variable/General.php';
include './Persona.php';
if ($int > 0) {
    echo $texto;
    return;
}
if ($int == 0) {
    $bdDato = " estado,nombre,apellido,cc,celular,carrera,correo,clave";
    $bdTabla = "estudiante";
    $bdAgrega = "'A','" . $nombre . "','" . $apellido . "', '" . $cedula . "', '"
            . $tele . "', " . $carrera . ", '" . $correo . "', '" . $clave . "'";
     include ('./../AdicionarGeneral.php');
    
    $n = $nombre . " " . $apellido;
    
    $bdDato = "Dia, ip,cc,nombres,carrera";
    $bdTabla = "d_r_estudiante";
    $bdAgrega = "curdate(),'" . $ip . "', '" . $cedula . "', '"
            . $n . "', '" . $carrera . "'";
    include ('./../AdicionarGeneral.php');
    
    include './../../../Modelo/Persona.php';
    $p = new Persona();
    $p->Cargar("E", $nombre, $cedula, $tele, $clave, "Agregado", "Activo");
    $_SESSION['persona'] = serialize($p);
    
    $bdDato = "Dia, ip,hora,user";
    $bdTabla = "inicioe";
    $bdAgrega = "curdate(),'" . $ip . "',curtime() ,'" . $cedula . "'";
    include ('./../AdicionarGeneral.php');

    $bdDato = 'max(id) n';
    $bdTabla = 'mformulario';
    $bdCondicion = '';
    include ('./../ConsultaGeneral.php'); 
    foreach ($Consulta as $fila) {
        $int = $fila['n'];
    } $int++;
    $bdDato = "id,cc,tipo,fecha,ip,estado";
    $bdTabla = "mformulario";
    $bdAgrega = "'" . $int . "','" . $cedula . "','RE',curdate(),'" . $ip . "','A'";
    include ('./../AdicionarGeneral.php');
    
    $bdDato = "mf,user,formu,p2,p3,p4,p5,b2,b8";
    $bdTabla = "dformulario";
    $bdAgrega = "'" . $int . "','" . $cedula . "','RE','" . $nombre . "','" . $apellido . "','0','" . $cedula . "','" . $correo . "','" . $tele . "'";
    include ('./../AdicionarGeneral.php');    
    
    $texto = "REGISTRADO<br>Ya puede entrar al sistema <a onclick='Iniciar()'>Presone aqui</a>"; 
}
echo $texto; 
die;
