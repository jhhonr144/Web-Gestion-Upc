
<div id="cerrar" class="close" ><a style="width: 20px;" onclick="EstudianteCarrera('X')">X</a></div>
    <select onchange="EXIdCarrera(this.value)" >
        <option value="0">Selecione...</option>  
        <option
        <?php
        $bdDato = "* ";
        $bdTabla = "carrera";
        $bdCondicion = 'where id>0';
        $cone = "./../../../Modelo/";
        include './../../../Controlador/BD/ConsultaGeneral.php';
        foreach ($Consulta as $fila) {
            echo " <option value='" . $fila['id'] . "'>";
            echo $fila['nombre'];
            echo "</option>";
        }
        ?>
</select> 
<div id="EXCEscogido"></div>
