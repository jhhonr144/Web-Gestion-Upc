<li class="dropdown">
    <a  data-toggle="dropdown" class="dropdown-toggle" onclick="document.getElementById('procesoN').innerHTML = ''">
        <i class="fa fa-tasks"></i>
        <span class="badge bg-theme" id="procesoN">
            <!--aqui cargocuantos estudiante estan llenando un fomulario
            son 7 formulariopara ayudas padrino-->
            <?php
//            include './../../../Controlador/Variable/Administrador.php';
            echo $todos;
            ?>
        </span>
    </a>
    <ul class="dropdown-menu extended tasks-bar">
        <div class="notify-arrow notify-arrow-green"></div>
        <li>
            <p class="green">Segimiento de ayudas </p>
        </li>



        <li class="external">
            <a >Iniciados <?php echo $todos; ?></a>
        </li>
        <li>
            <a onclick="alert('Los terminados');">
                <div class="task-info">
                    <div class="desc">Terminado</div>
                    <div class="percent"><?php echo round($por_completo = (($completo / $todos) * 100),3); ?>%</div>
                </div>
                <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" 
                         aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $por_completo; ?>%">

                    </div>
                </div>
            </a>
        </li>
        <li>
            <a onclick="alert('Los NO terminados');">
                <div class="task-info">
                    <div class="desc">Por terminar</div>
                    <div class="percent"><?php echo round($por_terminar = ( (1 - $por_completo/100 ) * 100),3); ?>%</div>
                </div>
                <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" 
                         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $por_terminar; ?>%">

                    </div>
                </div>
            </a>
        </li>
        <li> 
            <a  href="./Porcentaje.php">Ver Estadisticas</a>
        </li>


    </ul>
</li>
<!--        <li>
            <a href="index.html#">
                <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                </div>
                <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                        <span class="sr-only">70% Complete (Important)</span>
                    </div>
                </div>
            </a>
        </li>-->
<!--        <li>
            <a href="index.html#">
                <div class="task-info">
                    <div class="desc">Calificados</div>
                    <div class="percent">80%</div>
                </div>
                <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        <span class="sr-only">80% Complete</span>
                    </div>
                </div>
            </a>
        </li>-->