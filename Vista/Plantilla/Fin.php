<div class="text-center">
    <?php
    $bdDato = '*';
    $bdTabla = 'vista';
    $bdCondicion = 'where nombre="final"';
    include ($bd . 'ConsultaGeneral.php');
    foreach ($Consulta as $value) {
        $mostrar = utf8_encode($value['txt']);
    }
    echo $mostrar;
    ?> 
    <a href="#Inicio" class="go-top">
        <i class="fa fa-angle-up"></i>
    </a>
</div>