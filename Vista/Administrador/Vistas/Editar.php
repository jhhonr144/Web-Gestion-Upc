<?php
$atriburo = filter_input(INPUT_GET, 'variable', FILTER_SANITIZE_SPECIAL_CHARS);
$nValor = filter_input(INPUT_GET, 'valor', FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$bdHacer=$atriburo."='".$nValor."'";
$bdTabla="convocatoria";
$bdCondicion='where Id="'.$id.'"'; 
$cone="./../../../Modelo/";
include './../../../Controlador/BD/ActualizarEstudiante.php';
$tituloA="Actualizado";$textoA=$atriburo;$imagenA="";
include './../../Plantilla/Alerta.php';
?> <h5>Actualizado</h5>