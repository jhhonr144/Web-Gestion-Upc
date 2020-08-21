<?php

class Persona {
    private $tipo="_";
    private $nombre = "_";
    private $cedula = 0;
    private $celular = 0;
    private $correo = "_";
    private $clave = "_";
    private $mensaje = "_";
    private $estado = "_"; 

    function __construct() {        
    }
    public function Cargar($tipo,$nombre,$cedula,$celular,$correo,$clave,$mensaje,$estado){
        if($tipo != "") $this->tipo=$tipo;
        if($nombre != "") $this->nombre=$nombre;
        if($cedula != "") $this->cedula=$cedula;
        if($celular != "") $this->celular=$celular;
        if($correo != "") $this->correo=$correo;
        if($clave != "") $this->clave=$clave;
        if($mensaje != "") $this->mensaje=$mensaje;
        if($estado != "") $this->estado=$estado;
    }
            
    function getTipo() {
        return $this->tipo;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;  
    }
    function getNombre() {
        return $this->nombre;
    }
    function getCedula() {
        return $this->cedula;
    }  
    function getCelular() {
        return $this->celular;
    }
    function getCorreo() {
        return $this->correo;
    }
    function getClave() {
        return $this->clave;
    }
    function getEstado() {
        return $this->estado;
    }  

}
