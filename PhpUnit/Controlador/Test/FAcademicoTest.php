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
  
    public function testRegistrarBien() {         
        $va=["","Wilfrido","0","19000301","2019-01-01","55","55"
            ,"M","2000-02-02","prueba2@unicesar.edu.co","55","55","21"];
        $clase = new Formulario(); 
        $this->assertEquals(true, $clase->registrar2($va));
    }  
     public function testAgregarBien(){        
        $clase = new Formulario(); 
        $this->assertEquals(true, $clase->Agregar("id,cc,tipo,fecha,ip,estado,N","mformulario","'12','12','0','2019-09-09','109:09:09','A','12'"));
    } 
    public function testDesactivarBien(){        
        $clase = new Formulario(); 
        $this->assertEquals("9", $clase->ConsultarMId());
    }
}
