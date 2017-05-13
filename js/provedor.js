$(document).on("ready", inicio);
function inicio(){
	listaFactura();
	$('#clickRetenciones').on('click', listaFactura);
    $('#clickLiquidaciones').on('click', listaLiquidacion);
	//alert("sd");
}

//Facturas
function listaFactura(){
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("datosRetencion").innerHTML=xmlhttp.responseText;
        }
    }
    if (document.getElementById("desde").value==''&&document.getElementById("hasta").value=='') {
        xmlhttp.open("POST","../../js/procesos/listaRetencion.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("ced="+document.getElementById("cedu").value
            +"&id="+document.getElementById("id").value);
    }
    if (document.getElementById("desde").value!=''&&document.getElementById("hasta").value!='') {
        xmlhttp.open("POST","../../js/procesos/listaRetencionFecha.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("ced="+document.getElementById("cedu").value
            +"&id="+document.getElementById("id").value
            +"&desde="+document.getElementById("desde").value
            +"&hasta="+document.getElementById("hasta").value);
    }
    else{
        document.getElementById("datosRetencion").innerHTML="<div class='uk-alert uk-alert-danger'>Por favor llene los campos Correctamente</div>";
    }
}

//Liquidaciones
function listaLiquidacion(){
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("datosRetencion").innerHTML=xmlhttp.responseText;
        }
    }
    if (document.getElementById("desde").value==''&&document.getElementById("hasta").value=='') {
        xmlhttp.open("POST","../../js/procesos/listaRetencionLiq.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("ced="+document.getElementById("cedu").value
            +"&id="+document.getElementById("id").value);
    }
    if (document.getElementById("desde").value!=''&&document.getElementById("hasta").value!='') {
        xmlhttp.open("POST","../../js/procesos/listaRetencionLiqFecha.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("ced="+document.getElementById("cedu").value
            +"&id="+document.getElementById("id").value
            +"&desde="+document.getElementById("desde").value
            +"&hasta="+document.getElementById("hasta").value);
    }
    else{
        document.getElementById("datosRetencion").innerHTML="<div class='uk-alert uk-alert-danger'>Por favor llene los campos Correctamente</div>";
    }
}



//Generar XML
function generarXml(idXml){
    window.location.href = "../../js/procesos/generarXmlProvedor.php?idFac="+idXml
        +"&id="+document.getElementById("id").value;
}

//GenerarPdf
function generarPdf(numFac,id){
    window.location.href = "../../js/procesos/generarPdf.php?claveFac="+numFac+"&id="+id;
    //window.open("http://138.185.136.94:8080/anexos/docs_electronicos/pdfs/"+numFac+".pdf", 'resizable,scrollbars');
    /*window.open("../../js/procesos/pdfFactura.php?idFac="+idFac
        +"&id="+document.getElementById("id").value);
    console.log(idFac);*/
}