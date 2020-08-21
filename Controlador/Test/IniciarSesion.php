<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IniciarSesion
 *
 * @author wjpoz
 */
class IniciarSesion {
 
    public $variable;
    public $respuesta = false;

     function Conecion() { 
        $usuario = 'root';
        $pass = '';
        $conexion = new PDO('mysql:host=localhost;dbname=upc_gestion', $usuario, $pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }
    function iniciar($correo, $clave) { 
        $conexion=$this->Conecion();
        $bdDato = 'count(*) cuantos';
        $bdTabla = 'estudiante';
        $bdCondicion = 'where correo="' . $correo . '" and clave="' . $clave . '"'; 
        $Consulta = $conexion->prepare('Select '.$bdDato.' from '.$bdTabla.'  '.$bdCondicion);
        $Consulta->execute();
        foreach ($Consulta as $fila) {
            if ($fila['cuantos'] == 0)return $this->respuesta=false;
            else return $this->respuesta=true;
        } 
        return $this->respuesta;
    }
    function CuantosUsuasrio($dato,$parametro){
        $conexion=$this->Conecion();
        $bdDato = 'count(*) cuantos';
        $bdTabla = 'estudiante';
        $bdCondicion = 'where ' . $dato . ' = "' . $parametro . '"';
        $Consulta = $conexion->prepare('Select '.$bdDato.' from '.$bdTabla.'  '.$bdCondicion);
        $Consulta->execute();
        foreach ($Consulta as $fila) {
            if ($fila['cuantos'] == 0)return $this->respuesta=false;
            else return $this->respuesta=true;
        } 
        return $this->respuesta;
    }
    function ConsultarEstado($cedula){
        $conexion=$this->Conecion();
        $bdDato = 'estado';
        $bdTabla = 'estudiante';
        $bdCondicion = 'where cc="' . $cedula . '"';
        $Consulta = $conexion->prepare('Select '.$bdDato.' from '.$bdTabla.'  '.$bdCondicion);
        $Consulta->execute();
        foreach ($Consulta as $fila) {
            return $fila['estado'];
        } 
        return "Inactivo";
    }

}
