<?php
$a = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_SPECIAL_CHARS);
if ($a == 0) {
    echo ' ';
} else {
    ?>
     <div class="row mt">
                <div class="col-lg-12" >            
                    <div class="content-panel"> 
                        <div id="cerrar" class="close" ><a style="width: 20px;" onclick="EstudianteCarrera('X')">X</a></div>
                        <h4><i class="fa fa-angle-right"></i> 
                            Estudiante por carrera
                        </h4>
                        <hr> 
                        <table class="table-responsive table table-bordered table-striped table-condensed cf" id="tabla">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Nombres</th>
                                    <th>Cedula</th> 
                                    <th>Celular</th>
                                    <th>Correo</th>  
                                </tr>
                            </thead>
                            <tbody>
            <?php
            $x = 0;
            $bdDato = "* ";
            $bdTabla = "estudiante ";
            $bdCondicion = 'where carrera=' . $a;
            $cone = "./../../../Modelo/";
            include './../../../Controlador/BD/ConsultaGeneral.php';
            foreach ($Consulta as $fila) {
                $x++;
                ?>
           
                                <tr> 
                                    <td id="estado"><?php echo $fila['estado']; ?></td>
                                    <td class="hidden-phone"><?php echo $fila['nombre'] . " " . $fila['apellido']; ?></td>
                                    <td><?php echo $fila['cc']; ?></td> 
                                    <td><?php echo $fila['celular']; ?></td>
                                    <td><?php echo $fila['correo']; ?></td> 
                                </tr>
                                <?php
                            }


                            if ($x == 0) {
                                echo '<tr><td>Sin dato</td></tr>';
                            }
                            ?>

                        </tbody>
                    </table>
                    <div id="Medio_1"></div>
                    </section>
                </div><!-- /content-panel -->
            </div><!-- /col-md-12 -->
        </div>


    <?php } ?>
