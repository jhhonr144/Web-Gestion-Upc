<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="#Inicio"><img src="<?php echo $foto . $logo; ?>"   width="200"></a></p>
            <h5 class="centered"><?php echo $usuario; ?></h5>

            <li >
                <a class="active" href="#Inicio" onclick="Inicio();">
                    <i class="fa fa-dashboard"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <li  >
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>Ayudas</span>
                </a>
                <ul class="sub">
                    <li><a onclick="AP();">Ayuda Padrino</a></li> 
                </ul>
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