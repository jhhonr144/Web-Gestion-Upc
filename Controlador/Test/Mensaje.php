<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RFormulario
 *
 * @author wjpoz
 */
class Mensaje {

    public $variable;
    public $respuesta = false;

    private function Conecion() {
        $usuario = 'root';
        $pass = '';
        $conexion = new PDO('mysql:host=localhost;dbname=upc_gestion', $usuario, $pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }

    function EnviarMensaje($reciba, $envia, $texto, $asunto) {
        $bdDato = "enviado,recibido,mensaje,Nenviado,Nrecibido,asunto,fecha";
        $bdTabla = "mensaje";
        $bdAgrega = "'" . $envia . "','000' ,'" . $texto
                . "','" . $this->nombre($envia) . "','ADMIN','" . $asunto . "',sysdate()";
        $this->Agregar($bdDato, $bdTabla, $bdAgrega);
        return true;
    }

    function Agregar($dato, $tabla, $agrega) {
        $conexion = $this->Conecion();
        $Consulta = $conexion->prepare("INSERT INTO " . $tabla
                . "(" . $dato . ")"
                . " VALUES ( " . $agrega . " )");
        $Consulta->execute();
        return true;
    }

    function nombre($cedula) {
        $conexion = $this->Conecion();
        $bdDato = 'nombre';
        $bdTabla = 'estudiante';
        $bdCondicion = 'where cc="' . $cedula . '"';
        $Consulta = $conexion->prepare('Select ' . $bdDato . ' from ' . $bdTabla . '  ' . $bdCondicion);
        $Consulta->execute();
        foreach ($Consulta as $fila) {
            return $fila['nombre'];
        }
        return "Error";
    }

}
