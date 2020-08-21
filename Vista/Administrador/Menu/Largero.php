 <!--header start-->
 <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Menu."></div>
              </div>
            <!--logo start-->
            <a href="#Inicio" onclick="Inicio();" class="logo"><b><?php echo $titulo;?></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu"> 
                    <!-- settings start -->
                    <?php include './Menu/Proceso.php';?>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                   <?php include './Menu/Mensaje.php';?>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div> 
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="#Salir" onclick="Salir();">Cerrar sección </a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->