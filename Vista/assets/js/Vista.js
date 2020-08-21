function RevisarInforme(){
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {    
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Formulario/Administracion/index.php", true);//case
    xhttp.send();
}
/*
##########################################
estudiante
##########################################
*/
function bottonpdf(a) {
    if (a != 0) {
        document.getElementById("demas").innerHTML = " ";
        if (a == 3) {
            carreras(1);
        }
        if (a == 4) {
            carreras(2);
        }
        if (a == 6) {
            carreras(3);
        }
        document.getElementById("botton").innerHTML = ' <input class="btn btn-next btn-fill btn-success btn-wd btn-sm" type="submit" value="Generar">';
    } else {
        document.getElementById("botton").innerHTML = ' ';
        document.getElementById("demas").innerHTML = " ";
    }

}
function Reporte() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "Vistas/Reporte.php", true);//case
    xhttp.send();
}

function EXIdCarrera(a) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("EXCEscogido").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "Vistas/EstudiantesCarrera.php?a=" + a, true);//case
    xhttp.send();

}
function EstudianteCarrera(a) {
    if (a === 'X') {
        document.getElementById("EstudianteCarrera").innerHTML = "";
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("EstudianteCarrera").innerHTML = this.responseText;
            }
            if (this.status === 404) {
                alert('PAGINA NOo ENCONTRADA');
            }
        };
        xhttp.open("GET", "Vistas/EXCarrera.php", true);//case
        xhttp.send();
    }

}

function EstudianteInico(cc) {
    if (cc === 'X') {
        document.getElementById("tablaIES").innerHTML = "";
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("tablaIES").innerHTML = this.responseText;
            }
            if (this.status === 404) {
                alert('PAGINA NOo ENCONTRADA');
            }
        };
        xhttp.open("GET", "Vistas/InicioDeEstudiante.php", true);//case
        xhttp.send();
    }

}

function cargarEstudianteAE() {
    $('#exampleModalLong').on('show.bs.modal', function (event) { }
    );
    alert(document.getElementById('tabla').rows[1].cells[4].value);
}


function VerEstudiante(cc) {
    if (cc === 'X') {
        document.getElementById("verEstudiante").innerHTML = "";
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("verEstudiante").innerHTML = this.responseText;
            }
            if (this.status === 404) {
                alert('PAGINA NOo ENCONTRADA');
            }
        };
        xhttp.open("GET", "./Vistas/VerEstudiante.php?cc=" + cc, true);//case
        xhttp.send();
    }
}
function IniciosEstuiante(a) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Vistas/IniciosSistema.php?quien=" + a, true);//case
    xhttp.send();
}
function  NActividad(a) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Vistas/NActividad.php?tipo=" + a, true);//case
    xhttp.send();
}
function  EditarInicio1(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Inicio.php?id1=" + id, true);//case
    xhttp.send();
}
function NFotoE(foto) {
    if (foto === "NO") {
        document.getElementById("nuevaImg").innerHTML = ' <img src="./../assets/img/General/NO.png" class="img-responsive" width="200" style="max-height: 100px">';
    } else {
        document.getElementById("nuevaImg").innerHTML = ' <img src="' + foto + '" class="img-responsive" width="200" style="max-height: 300px" max-height: 300px>';
    }
}
function  EditarInicio(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Inicio.php?id=" + id, true);//case
    xhttp.send();
}
function  EditarAP(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./AyudaPadrino.php?id=" + id, true);//case
    xhttp.send();
}


function Porcentaje() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
            aqui(1);
            aqui1(1);
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Porcentaje.php", true);//case
    xhttp.send();
}

function QuitarN(nombre) {
    document.getElementById(nombre).innerHTML = "";
}
function  Perfil() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        //Espere("Medio");
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Perfil.php", true);
    xhttp.send();
}
function  PerfilE(cc) {
    if (cc === 'X') {
        document.getElementById("Medio_1").innerHTML = "";
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            //Espere("Medio");
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("Medio_1").innerHTML = this.responseText;
            }
            if (this.status === 404) {
                alert('PAGINA NOo ENCONTRADA');
            }
        };
        xhttp.open("GET", "./Vistas/Perfil.php?cc=" + cc, true);
        xhttp.send();
    }
}

function  Formulario(cedula, tipo) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        Espere("Medio");
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Formulario/index.php?cedula=" + cedula + "&tipo=" + tipo, true);
    xhttp.send();
}

function MEnviado() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("MensajeV").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Mensaje/Enviado.php", true);//case
    xhttp.send();
}
function MLeer() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("MensajeV").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Mensaje/Leer.php", true);//case
    xhttp.send();
}
function MEnviar() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("MensajeV").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Mensaje/Enviar.php", true);//case
    xhttp.send();
}

function Mensaje() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Mensaje.php", true);//case
    xhttp.send();
}
function GuardarFormulario1(foto, nombre, tipocc, cedula, fecc, dcc, mcc, g, ln, fn, correo, dr, mr, b, d, t, c, filtro) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Guardar1").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./../../../Controlador/BD/Validar/FormularioAP.php?a1=" + foto + "&a2=" + nombre + "&a3=" + tipocc + "&a4=" + cedula + "&a5=" + fecc
            + "&a6=" + dcc + "&a7=" + mcc + "&a8=" + g + "&a9=" + ln + "&a0=" + fn + "&b1=" + correo + "&b2=" + dr + "&b3="
            + mr + "&b4=" + b + "&b5=" + d + "&b6=" + t + "&b7=" + c, true);
    xhttp.send();
}


function  Salir() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Respuesta").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./pades.php", true);
    xhttp.send();
}

function  Iniciara(correo, clave) {
    resp = "ERROR";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            //resp = this.responseText;
            document.getElementById("rclave").innerHTML = this.responseText;
           // NoIniciara(this.responseText);
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA11');
        }
    };
    xhttp.open("GET", "./../../Controlador/BD/Validar/InicioSecion.php?correo=" + correo + "&clave=" + clave, true);
    xhttp.send();
}

function  NoIniciara(que) {  //nop 
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
            document.getElementById("IError").innerHTML = que;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA22');
        }
    };
    xhttp.open("GET", "./Iniciar.php", true);
    xhttp.send();
}

function  Inicio() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Inicio.php", true);//case
    xhttp.send();
}

function  AP() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./AyudaPadrino.php", true);//case
    xhttp.send();
}

function  Nosotro() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Nosotro.php", true);//case
    xhttp.send();
}
function  Conocenos() {
    Nosotro();
}

function  Vision() {
    Nosotro();
}

function  Mision() {
    Nosotro();
}
function Registrar(nombre, apellido, correo, clave, cedula, clave2, celular, carrera) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("rboton").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./../../Controlador/BD/Validar/RegistrarPersona.php?nombre=" + nombre
            + "&apellido=" + apellido + "&correo=" + correo + "&clave=" + clave + "&cedula="
            + cedula + "&celular=" + celular + "&carrera=" + carrera, true);//case
    xhttp.send();
}
function  Registrarse() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Registrarse.php", true);//case
    xhttp.send();
}

function  Iniciar() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("Medio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Iniciar.php", true);//case
    xhttp.send();
}
function  Espere(donde) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById(donde).innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Cargando.php", true);//case
    xhttp.send();
}

//############################




 