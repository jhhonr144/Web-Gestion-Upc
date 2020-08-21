
 
    <div class="row mt">
        <div class="col-lg-12" >            
            <div class="content-panel"> 
                <div id="cerrar" class="close" ><a style="width: 20px;" onclick="EstudianteInico('X')">X</a></div>
                <h4><i class="fa fa-angle-right"></i> 
                   Inicio en el sistema de estudiante
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $bdDato = "e.estado,e.nombre,apellido,e.cc,c.nombre nombres,celular,correo,max(dia) dia,max(hora) hora ";
                        $bdTabla = "estudiante e inner join carrera c on e.carrera=c.id left join inicioe i on i.user=e.cc";
                        $bdCondicion = 'where e.clave != "ADMIN" group by c.nombre ,e.nombre order by dia desc';
                        $cone = "./../../../Modelo/";
                        include './../../../Controlador/BD/ConsultaGeneral.php';
                        foreach ($Consulta as $fila) {
                            ?>

                            <tr> 
                                <td id="estado"><?php echo $fila['estado']; ?></td>
                                <td class="hidden-phone"><?php echo $fila['nombre'] . " " . $fila['apellido']; ?></td>
                                <td><?php echo $fila['cc']; ?></td>
                                <td><?php echo $fila['nombres']; ?></td>
                                <td><?php echo $fila['celular']; ?></td>
                                <td><?php echo $fila['correo']; ?></td>
                                <td title='<?php echo $fila['hora']; ?>'><?php echo $fila['dia']; ?></td>

                            </tr>

                            <?php
                        }
                        ?> 
                    </tbody>
                </table>
                <div id="Medio_1"></div> 
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div>

