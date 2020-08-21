<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of REstudiante
 *
 * @author wjpoz
 */
class REstudiante {

    public $variable;
    public $respuesta = false;

    private  function  Conecion() {
        $usuario = 'root';
        $pass = '';
        $conexion = new PDO('mysql:host=localhost;dbname=upc_gestion', $usuario, $pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }

    function registrar($Estudiante) {
        /*
         * 1, 'nombre'
          2, 'cedula', FILT
          3'celular', FILTE
          4T, 'correo', FILT
          5ET, 'carrera', FI
          6, 'clave', FILTER
          7GET, 'apellido', 
         */
        $conexion = $this->Conecion();
        $bdDato = 'count(*) cuantos';
        $bdTabla = 'estudiante';
        $bdCondicion = 'where correo="' . $Estudiante[3] . '" and clave="' . $Estudiante[5] . '"';
        $Consulta = $conexion->prepare('Select ' . $bdDato . ' from ' . $bdTabla . '  ' . $bdCondicion);
        $Consulta->execute();
        foreach ($Consulta as $fila) {
            if ($fila['cuantos'] != 0)
                return $this->respuesta = false;
        }
        $bdDato = " estado,nombre,apellido,cc,celular,carrera,correo,clave";
        $bdTabla = "estudiante";
        $bdAgrega = "'A','" . $Estudiante[0] . "','" . $Estudiante[6] . "', '" . $Estudiante[1] . "', '"
                . $Estudiante[2] . "', " . $Estudiante[4] . ", '" . $Estudiante[3] . "', '" . $Estudiante[5] . "'";
        $Consulta = $conexion->prepare("INSERT INTO " . $bdTabla . "(".$bdDato.")". " VALUES ( ". $bdAgrega ." )");
        $Consulta->execute();
        return $this->respuesta=true;
    }

    

    function ConsultarEstado($cedula) {
        $conexion = $this->Conecion();
        $bdDato = 'estado';
        $bdTabla = 'estudiante';
        $bdCondicion = 'where cc="' . $cedula . '"';
        $Consulta = $conexion->prepare('Select ' . $bdDato . ' from ' . $bdTabla . '  ' . $bdCondicion);
        $Consulta->execute();
        foreach ($Consulta as $fila) {
            return $fila['estado'];
        }
        return "Inactivo";
    }

}
