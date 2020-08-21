
<?php
 
class conecion {
   
    function __construct() {        
    }
    public function Guardame() { 
        $usuario = 'root';
        $pass = '';
        $conexion = new PDO('mysql:host=localhost;dbname=upc_gestion', $usuario, $pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }

}
