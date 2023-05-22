function funcionAdmin() { 
    var usuario = "";
    llenarTablaAdmin(usuario);
}
function cargarTablaUsuario() {
    var usuario = 0;
    llenarTablaAdmin(usuario);
}
function llenarTablaAdmin(usuario){ 
    $.ajax({
        type: "GET",
        url: "../mostrar_usuariosAdmin.php",
        data: {usu:usuario},  

        success: function (respuesta) {
            $("#tablaUsuarioss").html(respuesta);
        },
        
        error: function (e) {
            $("#tablaUsuarioss").text("error:"+e.status+"error:"+e.statusText);
        }
    }); 
}

function funcionAdminPost(){
    var post = "";
    llenarTablaPost(post);
}
function llenarPost(){
    var post = 0;
    llenarTablaPost(post);
}



function llenarTablaPost(post){
    $.ajax({
        type: "GET",
        url: "../mostrar_post.php",
        data: {pub:post},
        success: function (answer){
            $("#tablaPost").html(answer);
        },
        error: function (e){
            $("#tablaPost").text("error:"+e.status+"error:"+e.statusText);
        }
    });
}

function funcionAdminPostC(){
    var post = document.getElementById('mi_post').value;
    llenarTablaPostC(post);
}

function llenarTablaPostC(post){
    $.ajax({
        type: "GET",
        url: "../mostrar_post.php",
        data: {pub:post},  
        success: function (respuesta) {
            $("#tablaPostC").html(respuesta);
        },
        error: function (e) {
            $("#tablaPostC").text("error:"+e.status+"error:"+e.statusText);
        }
    }); 
}

function funcionAdminC() { 
    var usuario = document.getElementById('mi_usu3').value;
    llenarTablaAdminC(usuario);
}
function llenarTablaAdminC(usuario){ 
    $.ajax({
        type: "GET",
        url: "../mostrar_usuariosAdmin.php",
        data: {usu:usuario},  

        success: function (respuesta) {
            $("#tablaUsuarios2").html(respuesta);
        },
        
        error: function (e) {
            $("#tablaUsuarios2").text("error:"+e.status+"error:"+e.statusText);
        }
    }); 
}
function borrarUsuario(id){
    $.post("../borrar_usuario.php",
    {
        id: id
    }, function() {
        RELOAD();
    });
}
function borrarPost(id){
    $.post("../borrar_post.php",
    {
        id: id
    }, function() {
        RELOAD();
    });
}
function banear(id){
    $.post("../banear.php",
    {
        id: id
    }, function() {
        RELOAD();
    });
}
function admin(id){
    $.post("../admin.php",
    {
        id: id
    }, function() {
        RELOAD();
    });
}
function insertarUsuario(){
    var mi_form=document.getElementById("formulario");
    if (mi_form.checkValidity()){
        var datos_form=new FormData(mi_form);
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } 
        else { 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                x = this.responseText;
            }
        }
        xmlhttp.open("POST", "../insertar_usuario.php", true);
        xmlhttp.send(datos_form);
    }
}

// Codigo de objetos

function insertarObjeto(){
    var mi_form=document.getElementById("formularioT");
    if (mi_form.checkValidity()){
        var datos_form=new FormData(mi_form);
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } 
        else { 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                x = this.responseText;
            }
        }
        xmlhttp.open("POST", "../insertar_objeto.php", true);
        xmlhttp.send(datos_form);
    }
}

function funcionAdminCB() { 
    var objeto = document.getElementById('mi_objeto').value;
    llenarTablaAdminB(objeto);
}

function llenarTablaAdminB(objeto){ 
    $.ajax({
        type: "GET",
        url: "../mostrar_objetosAdmin.php",
        data: {obj:objeto},  

        success: function (respuesta) {
            $("#tablaObjetos").html(respuesta);
        },
        
        error: function (e) {
            $("#tablaObjetos").text("error:"+e.status+"error:"+e.statusText);
        }
    }); 
}

function borrarObjeto(id){
    $.post("../borrar_objeto.php",
    {
        id: id
    }, function() {
        RELOAD();
    });
}

function funcionObjeto() { 
    var objeto = "";
    llenarTablaObjeto(objeto);
}
function llenarTablaObjeto(objeto){ 
    $.ajax({
        type: "GET",
        url: "../mostrar_objetosAdmin.php",
        data: {obj:objeto},  

        success: function (respuesta) {
            $("#tablaObjetos2").html(respuesta);
        },
        
        error: function (e) {
            $("#tablaObjetos2").text("error:"+e.status+"error:"+e.statusText);
        }
    }); 
}
function CargarTablaObjeto(){
    var objeto = 0;
    llenarTablaObjeto(objeto);
}

//Codigo tipos

function insertarTipo(){
    var mi_form=document.getElementById("formularioT");
    if (mi_form.checkValidity()){
        var datos_form=new FormData(mi_form);
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } 
        else { 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                x = this.responseText;
            }
        }
        xmlhttp.open("POST", "../insertar_Tipo.php", true);
        xmlhttp.send(datos_form);
    }
}
function funcionTipo() { 
    var tipo = "";
    llenarTablaTipo(tipo);
}
function llenarTablaTipo(tipo){ 
    $.ajax({
        type: "GET",
        url: "../mostrar_tiposAdmin.php",
        data: {tip:tipo},  

        success: function (respuesta) {
            $("#tablaTipos2").html(respuesta);
        },
        
        error: function (e) {
            $("#tablaTipos2").text("error:"+e.status+"error:"+e.statusText);
        }
    }); 
}
function borrarTipo(id){
    $.post("../borrar_tipo.php",
    {
        id: id
    }, function() {
        RELOAD();
    });
}
function funcionTipo() { 
    var tipo = "";
    llenarTablaTipo(tipo);
}

//Selector

function crearSelectorTipo() {
    $.get("../crearSelector_tipo.php", function (respuesta, status) {
        $("#lugarSelectorTipo").html(respuesta);
    });
}

function mifuncionTipo() {
    var dato = document.getElementById('seleccionTipo').value;
    llamarTipo(dato);
}

function llamarTipo(dato){
    // AJAX
    $.ajax({
           type: "GET",
           url: "../consultaPlaca.php",
           data: {q:dato},  

           success: function (respuesta) {
               $("#resultadoPlaca").html(respuesta);
           },
           
           error: function (e) {
               $("#result").text("error:"+e.status+"error:"+e.statusText);
           }
       }); 
}
function cargarPagina(page) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tablaPost").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "access_adminPost.php?page=" + page, true);
    xmlhttp.send();
}