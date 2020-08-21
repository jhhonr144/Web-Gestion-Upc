<?php

$filtroL = filter_input(INPUT_GET, 'control', FILTER_SANITIZE_SPECIAL_CHARS);
$cedula = filter_input(INPUT_GET, 'cc', FILTER_SANITIZE_SPECIAL_CHARS);
$valor = filter_input(INPUT_GET, 'valor', FILTER_SANITIZE_SPECIAL_CHARS);
$variable = filter_input(INPUT_GET, 'variable', FILTER_SANITIZE_SPECIAL_CHARS);
if ($filtroL != "" && $filtroL == "UPC") {
    $bdHacer = $variable . "='" . $valor."'";
    $bdTabla = "estudiante";
    $bdCondicion = 'where cc="' .$cedula.'"';
    include_once './../../Modelo/conecion.php';
    $conexion = new conecion();
    $Consulta = $conexion->Guardame()->prepare('UPDATE  ' .
            $bdTabla . '  SET  ' . $bdHacer . '  ' . $bdCondicion);
    $Consulta->execute();
}
?>
<script>
    addEventListener("load", function () {
                setTimeout(alert("Guardado"), 0);
            }, false);            
   
</script>
Guardado.