<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="#Inicio"><img src="<?php echo $foto . $logo; ?>"   width="200"></a></p>
            <h5 class="centered"><?php echo $usuario; ?></h5>

            <li >
                <a   href="javascript:;">
                    <i class="fa fa-dashboard"></i>
                    <span>Editar Vistas </span>
                </a>
                <ul class="sub">
                    <li><a onclick="Inicio()" >  Inicios</a></li>
                    <li><a onclick="AP();">Ayuda Padrino</a></li>                     
                </ul>
            </li>
            <li>
                <a onclick="RevisarInforme()" href="javascript:;">
                    <i class="fa fa-dashboard"></i>Revisar Formulario
                </a>
            </li>            
            <li>
                <a href="Porcentaje.php" href="javascript:;"<?php if (isset($select_2)) echo 'class="active"'; ?>>
                    <i class="fa fa-dashboard"></i>Analisis
                </a>
            </li>
            <li class="">
                <a  onclick="Perfil();">
                    <i class="fa fa-dashboard"></i>
                    <span>Perfil</span>
                </a>
            </li>
            <li >
                <a   onclick="Mensaje();">
                    <i class="fa fa-dashboard"></i>
                    <span>Mensaje</span>
                </a>
            </li>
            <li>                
                <a href="javascript:;" href="#Reportes" onclick="Reporte();">
                     <i class="glyphicon glyphicon-folder-open  four-text" aria-hidden="true"></i>
                    <span>Reportes</span>
                </a>
            </li>
           
            <li>                
                <a href="javascript:;" href="#Estudiante" onclick="IniciosEstuiante('0');">
                    <i class="fa fa-cogs"></i>
                    <span>Estudiante</span>
                </a>
            </li>
             <li>                
                <a href="javascript:;" href="#Salir" onclick="Salir();">
                    <i class="fa fa-cogs"></i>
                    <span>Cerrar sección</span>
                </a>
            </li>


        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->