<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="#Inicio"><img src="<?php echo $foto . $logo; ?>"   width="200"></a></p>
            <h5 class="centered"><?php echo $usuario; ?></h5>

            <li class="mt">
                <a class="active" href="#Inicio" onclick="Inicio();">
                    <i class="fa fa-dashboard"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>Ayudas</span>
                </a>
                <ul class="sub">
                    <li><a onclick="AP();">Ayuda Padrino</a></li> 
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cogs"></i>
                    <span>Conocenos</span>
                </a>
                <ul class="sub">
                    <li><a  onclick="Conocenos();">Nosotro</a></li>
                    <li><a  onclick="Vision();">Visión</a></li>
                    <li><a  onclick="Mision();">Misión</a></li>
                </ul>
            </li> 
            <li class="sub-menu">
                <a   href="#Inicio" onclick="Registrarse();">
                    <i class="fa fa-tasks"></i>
                    <span>Registrarse</span>
                </a> 
            </li> 
            <li class="sub-menu">
                <a   href="#Inicio" onclick="Iniciar();">
                    <i class="fa fa-tasks"></i>
                    <span>Iniciar</span>
                </a> 
            </li> 

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->