<section id="ConvocatoriasPasada">
<?php 

$cone="./../../Modelo/";
$puntos="./";
if (isset($POST_['Desactivar']) ||  isset($GET_['Desactivar']) ||  filter_input(INPUT_GET, 'Desactivar', FILTER_SANITIZE_SPECIAL_CHARS) != "") {
	$BorrarId= filter_input(INPUT_GET, 'Desactivar', FILTER_SANITIZE_SPECIAL_CHARS);
        $puntos="./../../";
        $bdHacer='Estado="D"';
        $bdTabla='Convocatoria';
        $bdCondicion='where Id="'.$BorrarId.'"'; 
        $cone="./../../../../Modelo/";
        include ($puntos.'../../Controlador/BD/ActualizarEstudiante.php');        
}else{
    echo "22";}
?>

    <table class="table table-bordered table-striped table-condensed cf">
        <thead class="cf">
            <tr> 
                <th class="numeric">Id</th>
                <th class="numeric">Nombre</th>
                <th class="numeric">Tipoa ayuda</th>
                <th class="numeric">Publicado</th>
                <th class="numeric">Fecha Inicio</th>
                <th class="numeric">Fecha Fin</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $bdDato="*";
            $bdCondicion = 'where Estado = "D" or FFinal < NOW()';
            include ($puntos.'../../Controlador/BD/ConsultaGeneral.php');
            foreach ($Consulta as $fila) {
                ?>
            <tr>
                <td data-title="Code"><?php echo $fila['Id']; ?></td>
                <td data-title="Company"><?php echo $fila['Nombre']; ?></td>
                <td class="numeric" data-title="Price"><?php if($fila['Para']=="AP"){ echo "Ayuda Padrino"; }?></td>
                <td class="numeric" data-title="Change"><?php echo $fila['Publica']; ?></td>
                <td class="numeric" data-title="Open"><?php echo $fila['FInicio']; ?></td>
                <td class="numeric" data-title="High"><?php echo $fila['FFinal']; ?></td> 
            </tr>
            <?php
            }
            $cone="./../../Modelo/";
        $puntos="./";
            ?>
        </tbody>
    </table>
</section>
