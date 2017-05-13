<?php
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);
$id_nota=$_GET['idFac'];

error_reporting(0);

$consulta="select documento_xml, autorizacion_nota from vta_nota_credito_venta where id_nota_credito_venta='".$id_nota."'";
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