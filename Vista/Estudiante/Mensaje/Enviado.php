<?php
if (!isset($_SESSION)) {
	SESSION_START();
}
if (isset($_SESSION['persona'])) {
	include_once ('./../../../Modelo/Persona.php');
	$p = unserialize($_SESSION['persona']);
	if ($p->getTipo() != 'Estudiante') {
			$url = './../../';
			echo '<meta http-equiv=refresh content="1; ' . $url . '">';
			die;
	}
}
$cone="./../../../Modelo/";
$bdDato="*";
$bdTabla="mensaje";
$bdCondicion='where enviado="'.$p->getCedula().'"';
include './../../../Controlador/BD/ConsultaGeneral.php';
foreach($Consulta as $fila){
echo '<div><a class="" data-toggle="modal" data-target="#myModa'.$fila['id'].'"> '.$fila['Asunto'].' </a><label>     Fecha envio: ' .$fila['fecha'].'</label>';

echo ' 
						
						<!-- Modal -->
						<div class="modal fade" id="myModa'.$fila['id'].'" >
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						        <h4 class="modal-title" id="myModalLabel">'.$fila['Asunto'].'</h4>
						      </div>
						      <div class="modal-body">
									'.$fila['mensaje'].'
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button> 
						      </div>
						    </div>
						  </div>
						</div>
						';
}
?>