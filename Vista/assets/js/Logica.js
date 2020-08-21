function Obligarcierre(n){   
$('#botun'+n).removeClass('switch-on');
var r = confirm("si fuerza el cierre antes de tiempo no se podran registrar otros estudiante ,esta seguro? .....");
  if (r == true) {
    $('#botun'+n).addClass('switch-off');
    DesavilitarConvocatoria(n);
    $('#TBotun'+n).addClass('visible');
  } else {
    $('#botun'+n).addClass('switch-on'); 
  } 
}
function DesavilitarConvocatoria(id){
     var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("ConvocatoriasPasada").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA'); 
        }
    };
    xhttp.open("GET", "./Formulario/Administracion/DConvocatoria.php?Desactivar="+id, true);//case
    xhttp.send();
}
function A_D_Estudiante(estado){
    if(estado==="A"){
        alert("activar");
    }else{
        alert("destactivar");
    }        
}
function GuardarActividad(estado, titulo, foto, texto, fecha) { 
    var res = foto.replace("./../assets/img/", "");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("REtor").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
            alerta(1);
        }
    };
    xhttp.open("POST", "./../../Controlador/BD/validar/RegistrarConvocatoria.php?titulo="+titulo+"&foto="
    +res +"&texto="+texto +"&para=true&fecha="+fecha, true);//case
    xhttp.send(); 
}
function GuardarConvocatoria(estado, titulo, foto, texto, fecha, fecha1, para) {
     
    var res = foto.replace("./../assets/img/", "");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("REtor").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
            alerta(1);
        }
    };
    xhttp.open("POST", "./../../Controlador/BD/validar/RegistrarConvocatoria.php?titulo="+titulo+"&foto="
    +res +"&texto="+texto +"&para=false&fecha="+fecha+"&fecha1="+fecha1, true);//case
    xhttp.send();
}
function CargarFoto(a) {
    var res = a.replace("C:\\fakepath\\", "");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("cargarfoto").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
            alerta(1);
        }
    };
    xhttp.open("POST", "./Vistas/SubirFoto.php?variable=" + res, true);//case
    xhttp.send();
}
function ActualizarF1(a, b, c, id) {
    if (a !== b) {
        if (confirm("Desea que se actualise el dato cambiado")) {
            var res = a.replace("./../assets/img/", "");
            CambioA1(res, c, id);
        } else {
            document.getElementById(c).value = b;
            document.getElementById("variable").value = b;
        }
    }
}
function Actualizar1(a, b, c, id) {
    if (a !== b) {
        if (confirm("Desea que se actualise el dato cambiado")) {
            CambioA1(a, c, id);
        } else {
            document.getElementById(c).value = b;
            document.getElementById("variable").value = b;
        }
    }
}
function CambioA1(texto, asunto, id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("cambio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
            alerta(1);
        }
    };
    xhttp.open("GET", "./Vistas/Editar_1.php?variable=" + asunto + "&valor=" + texto + "&id=" + id, true);//case
    xhttp.send();
}
function Avilitar1(e, a, id) {
    if (e === "D") {
        if (confirm("Desea Avilitar")) {
            CambioA1("A", a, id);
            document.getElementById("Estadox").value = "A";
        }
    } else {
        Desavilitar1(a, id)
    }
}
function Desavilitar1(a, id) {
    if (confirm("Desea Inavilitar")) {
        CambioA1("D", a, id);
        document.getElementById("Estadox").value = "D";
    }
}
function Desavilitar(a, id) {
    if (confirm("Desea Inavilitar")) {
        CambioA("D", a, id);
        document.getElementById("Estadox").value = "D";
    }
}
function Avilitar(e, a, id) {
    if (e === "D") {
        if (confirm("Desea Avilitar")) {
            CambioA("A", a, id);
            document.getElementById("Estadox").value = "A";
        }
    } else {
        Desavilitar(a, id)
    }
}
function DesavilitarF(a, id) {
    if (confirm("Desea Inavilitar")) {
        CambioA("General/NO.png", a, id);
    }
}
function Actualizar(a, b, c, id) {
    if (a !== b) {
        if (confirm("Desea que se actualise el dato cambiado")) {
            CambioA(a, c, id);
        } else {
            document.getElementById(c).value = b;
            document.getElementById("variable").value = b;
        }
    }
}
function ActualizarF(a, b, c, id) {
    if (a !== b) {
        if (confirm("Desea que se actualise el dato cambiado")) {
            var res = a.replace("./../assets/img/", "");
            CambioA(res, c, id);
        } else {
            document.getElementById(c).value = b;
            document.getElementById("variable").value = b;
        }
    }
}
function CambioA(texto, asunto, id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("cambio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
            alerta(1);
        }
    };
    xhttp.open("GET", "./Vistas/Editar.php?variable=" + asunto + "&valor=" + texto + "&id=" + id, true);//case
    xhttp.send();
}
function letra(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8)
        return true; // 3
    patron = /[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
function numeros(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8)
        return true; // 3
    ppatron = /\d/; // Solo acepta números// 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
function confirmar(a, b, c) {//cambiar directo a estudiante
    //a es el dato igresado
    //b el que estaba
    //c el atributo
    if (a != b) {
        if (confirm("Desea que se actualise el dato cambiado")) {
            Modificar(document.getElementById('cc').value, a, c);
        } else {
            document.getElementById(c).value = b;
            document.getElementById("variable").value = b;
        }
    }
}
function enter(e) {
    alert(8);
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13) {
        VerificarRegistro(document.getElementById('nombre').value,
                document.getElementById('apellido').value, document.getElementById('mail').value,
                document.getElementById('clave').value, document.getElementById('cc').value,
                document.getElementById('clave2').value,
                document.getElementById('cel').value, document.getElementById('car').value);
    }

}
function Modificar(cc, texto, asunto) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("cambio").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./Editar.php?cc=" + cc +
            "&variable=" + asunto + "&valor=" + texto + "&control=UPC", true);//case
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
    xhttp.open("GET", "./../../Controlador/BD/Validar/Mensaje.php?cc=" + cc +
            "&asunto=" + asunto + "&texto=" + texto + "&control=1", true);//case
    xhttp.send();
}
function MensajeE(asunto, texto, cc) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("respuesta").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./../../Controlador/BD/Validar/Mensaje.php?cc=" + cc +
            "&asunto=" + asunto + "&texto=" + texto + "&control=1", true);//case
    xhttp.send();
}
function DP45(a1, a2, a3, a4, cc) {
    Vaciar("error45");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("G45").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./../../../Controlador/BD/Validar/FormularioAP_3_4.php?cc=" + cc +
            "&a1=" + a1 + "&a2=" + a2 + "&a3=" + a3 + "&a4=" + a4, true);//case
    xhttp.send();
}
function DP44(a1, a2, a3, cc) {
    Vaciar("error44");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("G44").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./../../../Controlador/BD/Validar/FormularioAP_3_3.php?cc=" + cc +
            "&a1=" + a1 + "&a2=" + a2 + "&a3=" + a3, true);//case
    xhttp.send();
}
function DP43(a1, a2, a3, a4, cc) {
    Vaciar("error43");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("G43").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./../../../Controlador/BD/Validar/FormularioAP_3_2.php?cc=" + cc +
            "&a1=" + a1 + "&a2=" + a2 + "&a3=" + a3 + "&a4=" + a4, true);//case
    xhttp.send();
}
function DP42(a1, a2, a3, a4, a5, a6, a7, a8, a9, a0, a11, a12, a13, cc) {
    Vaciar("error42");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("G42").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./../../../Controlador/BD/Validar/FormularioAP_3_1.php?cc=" + cc +
            "&a1=" + a1 + "&a2=" + a2 + "&a3=" + a3 + "&a4=" + a4 + "&a5=" + a5 + "&a6=" + a6
            + "&a7=" + a7 + "&a8=" + a8 + "&a9=" + a9 + "&a0=" + a0 + "&a11=" + a11 + "&a12=" + a12 + "&a13=" + a13, true);//case
    xhttp.send();
}
function DP4(a1, a2, a3, a4, a5, a6, b1, cc) {
    Vaciar("error41");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("G41").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./../../../Controlador/BD/Validar/FormularioAP_3.php?cc=" + cc +
            "&a1=" + a1 + "&a2=" + a2 + "&a3=" + a3 + "&a4=" + a4 + "&a5=" + a5 + "&a6=" + a6
            + "&a7=" + b1, true);//case
    xhttp.send();
}
function DP32(a1, a2, a3, a4, a5, a6, b1, b2, b3, b4, b5, b6, c1, c2, c3, c4, c5, c6, cc) {
    Vaciar("error32");
    numero = a1.length;
    if (numero < 3 || numero > 100) {
        Error("error32", "Nombre debe estar entre 10 y 100 caracteres");
        return;
    }
    numero = a3.length;
    if ((numero < 0 || numero > 3) && (a3 < 0 || a3 > 100)) {
        Error("error32", "edad esta fuera de rango real");
        return;
    }
    numero = a4.length;
    if (numero < 3 || numero > 100) {
        Error("error32", "Ocupacion muy corta de caracteres");
        return;
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("G32").innerHTML = this.responseText;
        }
        if (this.status === 404) {
            alert('PAGINA NOo ENCONTRADA');
        }
    };
    xhttp.open("GET", "./../../../Controlador/BD/Validar/FormularioAP_2_1.php?cc=" + cc +
            "&a1=" + a1 + "&a2=" + a2 + "&a3=" + a3 + "&a4=" + a4 + "&a5=" + a5 + "&a6=" + a6
            + "&a7=" + b1 + "&a8=" + b2 + "&a9=" + b3 + "&a0=" + b4 + "&a11=" + b5 + "&a12=" + b6
            + "&a13=" + c1 + "&a14=" + c2 + "&a15=" + c3 + "&a16=" + c4 + "&a17=" + c5 + "&a18=" + c6, true);//case
    xhttp.send();



}
function DP3(a1, a2, a3, a4, a5, a6, a7, a8, a9, cc) {
    //6 7 8 9
    if (a2 == " " || a2 == "") {
        Error("error3", "Favor digitar numero de hermanos <br>si no tiene digitar 0");
        return;
    }
    if (a3 == " " || a3 == "") {
        document.getElementById("error3").innerHTML = '<P style="color:red">Favor digitar el lugar ocupados en los hijos de su padres</P>';
    } else {
        if (a5 == "" || a5 == " ") {
            document.getElementById("error3").innerHTML = '<P style="color:red">Favor digitar el numero de personas que tiene cargo</P>';
        } else {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("G3").innerHTML = this.responseText;
                }
                if (this.status === 404) {
                    alert('PAGINA NOo ENCONTRADA:_:');
                }
            };
            xhttp.open("GET", "./../../../Controlador/BD/Validar/FormularioAP_2.php?cc=" + cc + "&a1=" + a1 + "&a2=" + a2 + "&a3=" + a3 + "&a4=" + a4 + "&a5=" + a5 + "&a6=" + a6 + "&a7=" + a7
                    + "&a8=" + a8 + "&a9=" + a9, true);//case
            xhttp.send();
        }
    }

}
function VitaFormulario2(a1, a2, a3, a4, a5, a6, a7, a8, a9, a0, b1, b2, b3, cc) {
    //6 7 8 9
    if (a6 == " " || a6 == "") {
        document.getElementById("error2").innerHTML = '<P style="color:red">Favor digitar el promedio del periodo anterior</P>';
    } else {
        if (a7 == " " || a7 == "") {
            document.getElementById("error2").innerHTML = '<P style="color:red">Favor digitar el promedio acomulado</P>';
        } else {
            if (a8 == "" || a8 == " ") {
                document.getElementById("error2").innerHTML = '<P style="color:red">Favor digitar el valor dela matricula</P>';
            } else {
                if (b2 == "." || b2 == " " || b2 == "") {
                    document.getElementById("error2").innerHTML = '<P style="color:red">Favor precionar el icono del servicion y rellenar lo pedido</P>';
                } else {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200) {
                            document.getElementById("Guardar2").innerHTML = this.responseText;
                        }
                        if (this.status === 404) {
                            alert('PAGINA NOo ENCONTRADA');
                        }
                    };
                    xhttp.open("GET", "./../../../Controlador/BD/Validar/FormularioAP_1.php?ti=AP&cc=" + cc + "&a1=" + a1 + "&a2=" + a2 + "&a3=" + a3 + "&a4=" + a4 + "&a5=" + a5 + "&a6=" + a6 + "&a7=" + a7
                            + "&a8=" + a8 + "&a9=" + a9 + "&a0=" + a0 + "&b1=" + b1 + "&b2=" + b2 + "&b3=" + b3, true);//case
                    xhttp.send();
                }
            }
        }
    }

}
function VistaFormulario(foto, nombre, tipocc, cedula, fecc, dcc, mcc, g, ln, fn, correo, dr, mr, b, d, t, c, filtro) {
    Vaciar("error1");
    numero = nombre.length;
    if (numero < 3 || numero > 100) {
        Error("error1", "Nombre debe estar entre 3 y 100 caracteres");
        return;
    }
    tipo = tipocc;
    if (tipo < 0 && tipo > 3) {
        Error("error1", "Favor escoger tipo dodumento");
        return;
    }
    numero = cedula.length;
    if (numero < 0) {
        Error("error1", "Selecione tipo documento");
        return;
    }
    fecha = fecc;
    if (fecha === "") {
        Error("error1", "Fecha de Expedicion de la cedula no fue selecionada");
        return;
    }
    tipo = dcc;
    if (tipo < 0) {
        Error("error1", "Favor escoger Departamento");
        return;
    }
    tipo = mcc;
    if (tipo < 0) {
        Error("error1", "Favor escoger Municipio");
        return;
    }
    tipo = g;
    if (tipo === "0") {
        Error("error1", "Favor escoger Genero");
        return;
    }
    fecha = fn;
    if (fecha === "") {
        Error("error1", "Fecha de Expedicion no fue selecionada");
        return;
    }
    numero = b.length;
    if (numero < 8) {
        Error("error1", "Barrio es muy corto");
        return;
    }
    numero = d.length;
    if (numero < 8) {
        Error("error1", "Dirrecion corta");
        return;
    }
    numero = t.length;
    if ((!numero === 7 || !numero === 10)) {
        Error("error1", "Celular debe ser un fijo o un movil");
        return;
    }
    GuardarFormulario1(foto, nombre, tipocc, cedula, fecc, dcc, mcc, g, ln, fn, correo, dr, mr, b, d, t, c, filtro);
}
function Error(donde, que) {
    document.getElementById(donde).innerHTML = '<p style="color: red;">'+que+'</p>';
}
function Vaciar(donde) {
    document.getElementById(donde).innerHTML = '';
    return;
}
function Poner(donde, que) {
    document.getElementById(donde).innerHTML = '<p>' + que + '</p>';
    return;
}
function letra(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8)
        return true; // 3
    patron = /[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6 
}
function numeros(nu) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla == 8)
        return true; // 3
    ppatron = /\d/; // Solo acepta números// 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
function VerificarRegistro(nombre, apellido, correo, clave, cedula, clave2, celular, carrera) {
    Vaciar("rcorreo");
    Vaciar("rnombre");
    Vaciar("rapellido");
    Vaciar("rclave");
    Vaciar("rclave2");
    Vaciar("rcedula");
    Vaciar("rcelular");
    Vaciar("rcarrera"); 
    LNumero="1,2,3,4,5,6,7,8,9,0";
    //###########VC#########
    numero=correo.length;
     if (numero < 17 || numero > 100) {
        Error("rcorreo", "Correo invalido");
        return;
    }
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z-]{1,8}\.){1,3}[A-Z]{1,2}$/i;
    var res = correo.split("@unicesar.edu.co");
    if(res.length > 2 || res.length < 2) return Error("rcorreo","Correo invalido"); 
    else if(res[1].length !== 0)return Error("rcorreo","Correo invalido"); 
    
    if (!emailRegex.test(correo) ) {      
        return Error("rcorreo","No se permiten caracteres especiales" );
    } 
    //##################
    
    numero = nombre.length;
    if (numero < 3 || numero > 100) {
        Error("rnombre", "Nombre debe estar entre 3 y 100 caracteres");
        return;
    }else{
        for(j = 0; j < 10 ; j++ ){
            for(i = 0; i < nombre.length; i++) {
                if(nombre[i].indexOf(j) === 0 ) return Error("rnombre", "Los Numero No son permitido");
            }
        }
    }
    numero = apellido.length;
    if (numero < 4 || numero > 100) {
        return Error("rapellido", "Apellido debe estar entre 3 y 100 caracteres");        
    }else{
        for(j = 0; j < 10 ; j++ ){
            for(i = 0; i < apellido.length; i++) {
                if(apellido[i].indexOf(j) === 0 ) return Error("rapellido", "Los Numero No son permitido");
            }
        }
    }
    if (clave === clave2) {
        numero = clave.length;
        if (numero < 8 || numero > 20) {
            return Error("rclave", "Clave debe estar entre 8 y 20 caracteres");            
        }
    } else {
        Error("rclave", "No coincide");
        Error("rclave2", "");
        return;
    }
    numero = cedula.length;
    if (numero < 8 || numero > 11) {
        Error("rcedula", "Cedula debe estar entre 8 y 10 caracteres");
        return;
    }
    numero = celular.length;
    if ((!numero === 7 || !numero === 10) ) {
        Error("rcelular", "Celular debe ser un fijo o un movil");
        return;
    }else if ( celular[0] !== 3 || celular[0] !== 5)  Error("rcelular", "Debe empezar en 5 o 3");
    
    if (carrera === "" || carrera === -1) {
        Error("rcarrera", "Carrera no fue selecionada");
        return;
    }
    Registro(nombre, apellido, correo, clave, cedula, clave2, celular, carrera);
}
function Registro(nombre, apellido, correo, clave, cedula, clave2, celular, carrera) {
    Poner("rboton", "<h3>Procesando...</h3>");
    Registrar(nombre, apellido, correo, clave, cedula, clave2, celular, carrera);
}
function VerificarInicio(clave, correo) { 
    numero = clave.length;
    if (numero < 8 || numero > 20) {
        Error("rclave", "Clave debe estar entre 3 y 20 caracteres");
        return;
    }
    numero = correo.length;
    if (numero < 17 || numero > 100) {
        Error("rcorreo", "Correo invalido");
        return;
    }
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z-]{1,8}\.){1,3}[A-Z]{1,2}$/i;
    var res = correo.split("@unicesar.edu.co");
    if(res.length > 2 || res.length < 2) return Error("rcorreo","Correo invalido"); 
    else if(res[1].length !== 0)return Error("rcorreo","Correo invalido"); 
    
    if (!emailRegex.test(correo) ) {      
        return Error("rcorreo","No se permiten caracteres especiales" );
    }    
    Iniciara(correo, clave);
    //Espere("Medio");
}

//############
function RecuperarClave(correo, cedula) {
    alert("Inactiva opcion");
}