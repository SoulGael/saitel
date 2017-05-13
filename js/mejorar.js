$(document).on("ready", inicio);
function inicio(){
	carga_sucursal();
    cargaP1();
    cargaP2();
    cargaP3();
    cargaP4();
    cargaP5();

	$('#guardar').on('click', guardar);
    $('#guardarReclamo').on('click', guardarReclamo);
    $('#guardarCall').on('click', guardarCall);
}

function guardar(){
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("datos").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","../js/procesos/guardarEncuesta.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("1="+document.getElementById("P1").value
        +"&2="+document.getElementById("P2").value
        +"&3="+document.getElementById("P3").value
        +"&4="+document.getElementById("P4").value
        +"&5="+document.getElementById("P5").value
        +"&c1="+document.getElementById("cP1").value
        +"&c2="+document.getElementById("cP2").value
        +"&c3="+document.getElementById("cP3").value
        +"&c4="+document.getElementById("cP4").value
        +"&c5="+document.getElementById("cP5").value
        +"&nom="+document.getElementById("nombres").value
        +"&ci="+document.getElementById("ci").value
        +"&suc="+document.getElementById("sucursal").value);
}

function guardarReclamo(){
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("respuesta").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","../js/procesos/guardarReclamo.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("1="+document.getElementById("ci").value
        +"&2="+document.getElementById("telf").value
        +"&3="+document.getElementById("tipo").value
        +"&4="+document.getElementById("desc").value);
}

function guardarCall(){
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("respuestaCall").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","../js/procesos/guardarCall.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("2="+document.getElementById("nombreCall").value
        +"&3="+document.getElementById("correoCall").value
        +"&4="+document.getElementById("telfCall").value);
}

function carga_sucursal() {
	$("#sucursal").empty();
	$.getJSON('../js/procesos/cargaSucursales.php',function(data){
        //console.log(JSON.stringify(data));
        $.each(data, function(k,v){
            $("#sucursal").append("<option value=\""+k+"\">"+v+"</option>");
        });
    });
}

function cargaP1() {
    $("#P1").empty();
    $("#P1").append("<option value=5>Muy Bueno</option>");
    $("#P1").append("<option value=4>Bueno</option>");
    $("#P1").append("<option value=3>Aceptable</option>");
    $("#P1").append("<option value=2>Malo</option>");
    $("#P1").append("<option value=1>Muy Malo</option>");
}

function cargaP2() {
    $("#P2").empty();
    $("#P2").append("<option value=5>Muy Bueno</option>");
    $("#P2").append("<option value=4>Bueno</option>");
    $("#P2").append("<option value=3>Aceptable</option>");
    $("#P2").append("<option value=2>Malo</option>");
    $("#P2").append("<option value=1>Muy Malo</option>");
}

function cargaP3() {
    $("#P3").empty();
    $("#P3").append("<option value=5>Muy Bueno</option>");
    $("#P3").append("<option value=4>Bueno</option>");
    $("#P3").append("<option value=3>Aceptable</option>");
    $("#P3").append("<option value=2>Malo</option>");
    $("#P3").append("<option value=1>Muy Malo</option>");
}

function cargaP4() {
    $("#P4").empty();
    $("#P4").append("<option value=5>Muy Bueno</option>");
    $("#P4").append("<option value=4>Bueno</option>");
    $("#P4").append("<option value=3>Aceptable</option>");
    $("#P4").append("<option value=2>Malo</option>");
    $("#P4").append("<option value=1>Muy Malo</option>");
}

function cargaP5() {
    $("#P5").empty();
    $("#P5").append("<option value=5>Muy Bueno</option>");
    $("#P5").append("<option value=4>Bueno</option>");
    $("#P5").append("<option value=3>Aceptable</option>");
    $("#P5").append("<option value=2>Malo</option>");
    $("#P5").append("<option value=1>Muy Malo</option>");
}

//$('#guardar').on('click', alert("asd"));