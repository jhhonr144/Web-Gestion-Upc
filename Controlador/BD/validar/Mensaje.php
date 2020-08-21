<?php

$control = filter_input(INPUT_GET, 'control', FILTER_SANITIZE_SPECIAL_CHARS);
$on = "nell";
if ($control == 1) {
    $on = "true";
}
if ($on == "true") {
    ####################################################
    $cone = "./../../../Modelo/";
    $ip = $_SERVER['REMOTE_ADDR'];
    include $cone . 'Persona.php';
    if (!isset($_SESSION))
        session_start();
    if (isset($_SESSION['persona']))
    $p = unserialize($_SESSION['persona']);    
    $mensajem = filter_input(INPUT_GET, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
    $asuntom = filter_input(INPUT_GET, 'asunto', FILTER_SANITIZE_SPECIAL_CHARS);
    $bdDato = "enviado,recibido,mensaje,Nenviado,Nrecibido,asunto,fecha";
    $bdTabla = "mensaje";
    $bdAgrega = "'" . $p->getCedula() . "','000' ,'" . $mensajem . "','" . $p->getNombre() . "','ADMIN','" . $asuntom . "',sysdate()";
    include './../AdicionarGeneral.php'; 
    echo "Enviado";

    ####################################################
}else {
     ####################################################
    $cone = "./../../../Modelo/";
    $ip = $_SERVER['REMOTE_ADDR'];
    include $cone . 'Persona.php';
    if (!isset($_SESSION))
        session_start();
    if (isset($_SESSION['persona']))
    $p = unserialize($_SESSION['persona']);    
    $mensajem = filter_input(INPUT_GET, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
    $asuntom = filter_input(INPUT_GET, 'asunto', FILTER_SANITIZE_SPECIAL_CHARS);
    $bdDato = "enviado,recibido,mensaje,Nenviado,Nrecibido,asunto,fecha";
    $bdTabla = "mensaje";
    $bdAgrega = "'000' ,'" . $p->getCedula() . "','"  . $mensajem . "','ADMIN','" . $p->getNombre() . "','" . $asuntom . "',sysdate()";
    include './../AdicionarGeneral.php'; 
    echo "Enviado";

    ####################################################
}

