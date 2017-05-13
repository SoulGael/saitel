$(document).on("ready", inicio);
function inicio(){
	$('#clickCliente').on('click', ingresoCliente);
	$('#clickProveedor').on('click', ingresoProveedor);
	//alert("sd");
}

function ingresoCliente(){
	var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            var id=xmlhttp.responseText;
            if(id=='0'){
                window.open('../../pags/facturaElectronica/clientes.php', '_parent');
            }
            document.getElementById("datos").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","../../js/procesos/ingresoCliente.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("cedula="+document.getElementById("cedula").value
        +"&tipo=1");
}
function ingresoProveedor(){
	var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            var id=xmlhttp.responseText;
            if(id=='0'){
                window.open('../../pags/facturaElectronica/provedor.php', '_parent');
            }
            document.getElementById("datos").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","../../js/procesos/ingresoCliente.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("cedula="+document.getElementById("cedula").value
        +"&tipo=2");
}