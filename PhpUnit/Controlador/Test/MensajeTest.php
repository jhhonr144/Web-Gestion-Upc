<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MensajeTest
 *
 * @author wjpoz
 */
class MensajeTest extends PHPUnit\Framework\TestCase {

    public function testnombreMal() {
        $clase = new Mensaje();
        $this->assertEquals("Error", $clase->nombre("9888"));
    }

    public function testnombreBien() {
        $clase = new Mensaje();
        $this->assertEquals("wil", $clase->nombre("10000001"));
    }
 

    public function testmensaje() {
        $clase = new Mensaje();
        $this->assertEquals(true, $clase->EnviarMensaje("000", "10000001","Test","Prueba"));
    }

}
