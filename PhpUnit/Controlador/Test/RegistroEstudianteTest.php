<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of REstudianteTest
 *
 * @author wjpoz
 */
class REstudianteTest extends PHPUnit\Framework\TestCase {
 /*
         * 1, 'nombre'
          2, 'cedula', FILT
          3'celular', FILTE
          4T, 'correo', FILT
          5ET, 'carrera', FI
          6, 'clave', FILTER
          7GET, 'apellido', 
         */
    public function testIniciarBien() {  
        $va=["Prueba","19000001","3006448200","prueba@unicesar.edu.co","1","probando","Probador"];
        $clase = new REstudiante(); 
        $this->assertEquals(true, $clase->registrar($va));
    } 
    public function testIniciarMal() {  
        $va=["Prueba","19000001","3006448200","prueba@unicesar.edu.co","1","probando","Probador"];
        $clase = new REstudiante(); 
        $this->assertEquals(false, $clase->registrar($va));
    }
     public function testConsultarEstadoBien(){        
        $clase = new REstudiante(); 
        $this->assertEquals("A", $clase->ConsultarEstado("10000001"));
    }
    public function testConsultarEstadoMal(){        
        $clase = new REstudiante(); 
        $this->assertEquals("Inactivo", $clase->ConsultarEstado("0"));
    }
}
