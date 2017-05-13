<?php 
# Cargamos la librería dompdf.
require_once("dompdf/dompdf_config.inc.php");
include 'conexion.php';
conectarse();
$idFac=$_GET['idFac'];
$id=$_GET['id'];
$codigo='<html>
  <head>  </head>

  <body>';

$consulta="select documento_xml, numero_autorizacion from vta_factura_venta where id_factura_venta='".$idFac."'";
$resultado=pg_query($consulta) or die (pg_last_error());

if(pg_num_rows($resultado)==0){

  echo '<b>No tiene Facturas</b>';

}else{
  while($fila=pg_fetch_array($resultado)){
  }
}

$codigo.='<table>';
  $codigo.='<tr>';

    $codigo.='<td style="text-align:center; border-top-style: solid; width:100% ";>SOLUCIONES AVANZADAS';
    $codigo.='</td>';

    $codigo.='<td>';
    $codigo.='</td>';

     $codigo.='<td>CI 1003291034';
    $codigo.='</td>';

  $codigo.='</tr>';
$codigo.='</table>';


  $codigo.='</body>
  </html>';

    $codigo=utf8_decode($codigo);
    $dompdf= new DOMPDF();
    $dompdf->load_html($codigo);
    ini_set("memory_limit","1000M");
    ini_set("max_execution_time","1000");
    //$dompdf->set_paper("A4","portrait");
    $dompdf->render();
    //$dompdf->stream("Notificaciones.pdf");
    $dompdf->stream('Notificaciones.pdf',array('Attachment'=>0));
?>
