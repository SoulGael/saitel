<?php
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);
$id_factura=$_GET['idFac'];

error_reporting(0);

$consulta="select documento_xml, numero_autorizacion from vta_factura_venta where id_factura_venta='".$id_factura."'";
$resultado=pg_query($consulta) or die (pg_last_error());

while($fila=pg_fetch_array($resultado)){

	header("Content-Description: File Transfer");
	header("Content-Type: application/force-download");
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
    header("Content-Disposition: attachment; filename=".$fila[1].".xml;" );
    //header("Content-Transfer-Encoding: binary");
	print $fila[0];
}

?>