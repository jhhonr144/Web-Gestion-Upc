<?php
$vino = filter_input(INPUT_GET, 'cc', FILTER_SANITIZE_SPECIAL_CHARS);
$bdDato = "e.estado,e.nombre,apellido,e.cc,c.nombre nombres,celular,correo, tipo,max(dia) dia,max(hora) hora ";
$bdTabla = "estudiante e inner join carrera c on e.carrera=c.id left join inicioe
                 i on i.user=e.cc  left join mformulario f on f.cc=e.cc";
$bdCondicion = 'where e.clave != "ADMIN" and e.cc=' . $vino;
$cone = "./../../../Modelo/";
include './../../../Controlador/BD/ConsultaGeneral.php';

foreach ($Consulta as $fila) {
    ?>

    <div class="row mt">
        <div class="col-lg-12" >            
            <div class="content-panel"> 
                <div id="cerrar" class="close" ><a style="width: 20px;" onclick="VerEstudiante('X')">X</a></div>
                <h4><i class="fa fa-angle-right"></i> 
                    Datos de <?php echo $fila['nombre']; ?>
                </h4>
                <hr> 
                <table class="table-responsive table table-bordered table-striped table-condensed cf" id="tabla">
                    <thead>
                        <tr>
                            <th>Estado</th>
                            <th>Nombres</th>
                            <th>Cedula</th>
                            <th>Carrera</th>
                            <th>Celular</th>
                            <th>Correo</th> 
                            <th>Ultimo Inicio</th> 
                            <th >Ayuda Solicitada</th> 
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td id="estado"><?php echo $fila['estado']; ?></td>
                            <td class="hidden-phone"><?php echo $fila['nombre'] . " " . $fila['apellido']; ?></td>
                            <td><?php echo $fila['cc']; ?></td>
                            <td><?php echo $fila['nombres']; ?></td>
                            <td><?php echo $fila['celular']; ?></td>
                            <td><?php echo $fila['correo']; ?></td>
                            <td title='<?php echo $fila['hora']; ?>'><?php echo $fila['dia']; ?></td>
                            <td><?php echo $fila['tipo']; ?></td>
                            <td>
                                <?php
                                if ($fila['estado'] != "A") {
                                    ?>
                                    <button class="btn btn-success btn-xs" onclick="A_D_Estudiante(document.getElementById('estado').value)">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <?php
                                } else {
                                    ?>
                                    <button class="btn btn-danger btn-xs" onclick="A_D_Estudiante(document.getElementById('estado').value)">
                                        <i class="fa fa-trash-o "></i>
                                    </button>
                                    <?php
                                }
                                ?>
                                <button class="btn btn-primary btn-xs"  onclick="PerfilE(document.getElementById('tabla').rows[1].cells[2].innerText)" >
                                    <i class="fa fa-pencil"></i>
                                </button>  
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div id="Medio_1"></div>
                </section>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div>


    <?php
}
$bdDato = "count(*)";
$bdTabla = "estudiante ";
$bdCondicion = 'where cc = ' . $vino;
include './../../../Controlador/BD/ConsultaGeneral.php';
foreach ($Consulta as $fila) {
    if ($fila['count(*)'] == 0) {
        echo '
            Sin Datos del documento => ' . $vino;
    }
}
?> 


