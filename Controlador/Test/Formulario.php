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
class Formulario {

    public $variable;
    public $respuesta = false;

    private function Conecion() {
        $usuario = 'root';
        $pass = '';
        $conexion = new PDO('mysql:host=localhost;dbname=upc_gestion', $usuario, $pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }

    function registrar1($Formulario) {
        /*$Formulario[0]=foto
         * $Formulario[1]=nombre
         * $Formulario[2]=tipocc 0
         * $Formulario[3]=cc
         * $Formulario[4]=fecha
         * $Formulario[5]=depar
         * $Formulario[6]=muni
         * $Formulario[7]=genero M
         * $Formulario[8]=nacio
         * $Formulario[9]=fecha
         * $Formulario[10]=coreo
         * $Formulario[11]=depar
         * $Formulario[12]=muni
         * $Formulario[5]=bari
         * $Formulario[6]=dire
         * $Formulario[5]=tele
         * $Formulario[6]=cele 
         */
        $conexion = $this->Conecion();
        $ip = "190:90:90:0";
        $this->Desactivar($Formulario[3]);
        $m = ($this->ConsultarMId()) + 1;

        $bddato = "id,cc,tipo,fecha,ip,estado,N";
        $bdtabla = "mformulario";
        $bdagrega = "'" . $m . "','" . $Formulario[3] . "','AP',curdate(),'" . $ip . "','A','1'";
        $this->Agregar($bddato, $bdtabla, $bdagrega);

        $mf = $this->ConsultarId($Formulario[3]);
        
        $bddato = "mf,user,formu,p1,p2,p3,p4,p5,p6,p7,p8,p9,p0,b1,b2,b3,b4,b5,b6,b7";
        $bdtabla = "dformulario";
        $bdagrega = "'" . $mf . "','" . $Formulario[3] . "','1','" . $Formulario[0] . "','" . $Formulario[1] 
                . "','" . $Formulario[2] . "','" . $Formulario[3] . "','". $Formulario[4] . "','" 
                . $Formulario[5] . "','" . $Formulario[6] . "','" . $Formulario[7] . "','" . $Formulario[8] 
                . "','" . $Formulario[9] . "','" . $Formulario[10] . "','"
        . $Formulario[11] . "','" . $Formulario[12] . "','" . $Formulario[13] . "', '" . $Formulario[14] . "','"
                . $Formulario[15] . "','" . $Formulario[16] . "'";
        $this->Agregar($bddato, $bdtabla, $bdagrega);
        return true;
    }
 function registrar2($Formulario) {
        /*$Formulario[0]=sede
         * $Formulario[1]=faculta
         * $Formulario[2]=prograama
         * $Formulario[3]=jornada
         * $Formulario[4]=semestre
         * $Formulario[5]=promedio
         * $Formulario[6]=acumulado
         * $Formulario[7]=valor
         * $Formulario[8]=on
         * $Formulario[9]=on
         * $Formulario[10]=on
         * $Formulario[11]=text 
         */
     $mf=9;
        $conexion = $this->Conecion();  
        $bddato = "mf,user,formu,p1,p2,p3,p4,p5,p6,p7,p8,p9,p0,b1,b2,b3";
        $bdtabla = "dformulario";
        $bdagrega = "'" . $mf . "','" . $Formulario[3] . "','1','" . $Formulario[0] . "','" . $Formulario[1] 
                . "','" . $Formulario[2] . "','" . $Formulario[3] . "','". $Formulario[4] . "','" 
                . $Formulario[5] . "','" . $Formulario[6] . "','" . $Formulario[7] . "','" . $Formulario[8] 
                . "','" . $Formulario[9] . "','" . $Formulario[10] . "','"
        . $Formulario[11] . "','" . $Formulario[12] . "'";
        $this->Agregar($bddato, $bdtabla, $bdagrega);
        return true;
    }

    function Agregar($dato, $tabla, $agrega) {
        $conexion = $this->Conecion();                
        $Consulta = $conexion->prepare("INSERT INTO " . $tabla
            . "(".$dato.")"
            . " VALUES ( ". $agrega ." )");
        $Consulta->execute();
        return true;
    }

    function Desactivar($cedula) {
        $conexion = $this->Conecion();
        $bdHacer = 'estado="DESACTIVADO"';
        $bdTabla = 'mformulario';
        $bdCondicion = 'where cc=' . $cedula . ' and tipo="AP" and N="1"';
        $Consulta = $conexion->prepare('UPDATE  '.$bdTabla  .'  SET  '. $bdHacer  .'  '. $bdCondicion); 
        $Consulta->execute();
        return true;
    }

    function ConsultarId($cedula) {
        $conexion = $this->Conecion();
        $bdDato = 'id x';
        $bdTabla = 'mformulario';
        $bdCondicion = 'where cc="' . $cedula . '" and estado="A" and N="1"';
        $Consulta = $conexion->prepare('Select ' . $bdDato . ' from ' . $bdTabla . '  ' . $bdCondicion);
        $Consulta->execute();
        foreach ($Consulta as $fila) {
            return $fila['x'];
        }
        return "0";
    }

    function ConsultarMId() {
        $conexion = $this->Conecion();
        $bdDato = 'max(id) x';
        $bdTabla = 'mformulario';
        $bdCondicion = '';
        $Consulta = $conexion->prepare('Select ' . $bdDato . ' from ' . $bdTabla . '  ' . $bdCondicion);
        $Consulta->execute();
        foreach ($Consulta as $fila) {
            return $fila['x'];
        }
        return "0";
    }

}
