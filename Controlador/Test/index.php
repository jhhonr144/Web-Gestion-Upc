<html>
    <head>
        <title>Pruebas</title>
    </head>
    <body>
        <p>Hola mundo!</p>
        <?php
        
        include './IniciarSesion.php';
        $clase = new IniciarSesion();
        if($clase->iniciar("q@unicesar.edu.co","qqq"))echo "sisas";
        else    echo 'nell';
        ?>
    </body>
</html>