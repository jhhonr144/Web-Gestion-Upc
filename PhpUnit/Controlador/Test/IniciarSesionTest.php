<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IniciarSesionTest
 *
 * @author wjpoz
 */
class IniciarSesionTest extends PHPUnit\Framework\TestCase {

    public function testIniciarMal() {        
        $clase = new IniciarSesion(); 
        $this->assertEquals(false, $clase->iniciar("sisas", "sisas"));
    }
    public function testIniciarBien() {        
        $clase = new IniciarSesion(); 
        $this->assertEquals(true, $clase->iniciar("q@unicesar.edu.co", "qqq"));
    }
    public function testCuantosUsuasrioBien(){        
        $clase = new IniciarSesion(); 
        $this->assertEquals(true, $clase->CuantosUsuasrio("cc", "10000001"));
    }
    public function testCuantosUsuasrioMal(){        
        $clase = new IniciarSesion(); 
        $this->assertEquals(true, $clase->CuantosUsuasrio("cc", "10000002"));
    } 
     public function testConsultarEstadoBien(){        
        $clase = new IniciarSesion(); 
        $this->assertEquals("A", $clase->ConsultarEstado("10000001"));
    }
    public function testConsultarEstadoMal(){        
        $clase = new IniciarSesion(); 
        $this->assertEquals("Inactivo", $clase->ConsultarEstado("0"));
    }
}
