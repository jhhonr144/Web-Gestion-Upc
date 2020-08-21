<?php
if (!isset($_SESSION)) {
    SESSION_START();
}

/*
Modero que sea un estudiante que entre aqui
*/
if (isset($_SESSION['persona'])) {
    include_once ('./../../Modelo/Persona.php');
    $p = unserialize($_SESSION['persona']);
    if ($p->getTipo() != 'Administrador') {
        $url = './../';
        echo '<meta http-equiv=refresh content="1; ' . $url . '">';
        die;
    } 
} 
else {
    $url = './../';
    echo '<meta http-equiv=refresh content="1; ' . $url . '">';
    die;
}

include_once ('./../../Controlador/Variable/Administrador.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head> 
        <?php include('./../Plantilla/Head.php'); ?>
    </head>

    <body>
        <div id="Respuesta"></div>
        <section id="Inicio" >
            <?php include('./Menu/Menu.php'); ?>      
            <!-- **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** -->
            <!--main content start-->
            <section id="main-content">
                <section class="Medio">
                    <div class="row">
                        <div class="col-lg-11 main-chart">                   
                            <?php include_once ('./../Plantilla/Medio.php'); ?>
                        </div><!-- /col-lg-9 END SECTION MIDDLE -->
                        <!-- **********************************************************************************************************************************************************
                        RIGHT SIDEBAR CONTENT
                        *********************************************************************************************************************************************************** -->                  
                       <?php  //include_once ('./../Plantilla/Notificaciones/Ariba.php'); ?>

                    </div><! --/row -->
                </section>
            </section>

            <!--main content end-->
            <!--footer start-->
            <footer class="site-footer" style="margin-top: 55px">
                <?php include('./../Plantilla/Fin.php'); ?>
            </footer>
            <!--footer end-->
        </section>
        <?php
        include  ('./../../Controlador/Variable/Administrador.php');
        include ('./../Plantilla/Scritp.php'); 
        include ($puntos . 'Plantilla/Notificaciones/UltimoInicio.php');
        include ($puntos.'Plantilla/Alerta.php');
        ?>

    </body>
</html>
