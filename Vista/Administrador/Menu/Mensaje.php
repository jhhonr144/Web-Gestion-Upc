<li id="header_inbox_bar" class="dropdown">
    <a data-toggle="dropdown" class="dropdown-toggle" onclick="document.getElementById('mensajeN').innerHTML = ''" >
        <i class="fa fa-envelope-o"></i>
        <span class="badge bg-theme" id="mensajeN">
            <?php
            $bdDato = "count(*) m";
            $bdTabla = "mensaje";
            $bdCondicion = 'where recibido="000" and leido="NO"';
            include './../../Controlador/BD/ConsultaGeneral.php'; 
            foreach ($Consulta as $fila) {
                echo $fila['m']; break;
            } 
            ?>
        </span>
    </a>
    <ul class="dropdown-menu extended inbox">
        <div class="notify-arrow notify-arrow-green"></div>
        <li>
            <p class="green">Lista de Asunto de mensajes</p>
        </li>
        <?php
        $bdDato = "*";
            $bdTabla = "mensaje";
            $bdCondicion = 'where recibido="000" limit 3';
            include './../../Controlador/BD/ConsultaGeneral.php'; 
            foreach ($Consulta as $fila) { 
        ?>
        <li>
            <a >
                <span class="photo"><?php
                    echo $fila['Nenviado'];
                ?></span>
                <span class="subject">
                    <span class="from"><?php
                    echo $fila['Asunto'];
                ?></span> 
                    <span class="time">
                        <?php
                    echo $fila['fecha'];
                ?>
                        
                </span> 
            </a>
        </li> 
        <?php
            }
        ?>
        <li>
            <a onclick="Mensaje()">Ver Mensajes</a>
        </li>
    </ul>
</li>
