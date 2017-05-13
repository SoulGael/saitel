	<?php
session_start();
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);
$cedula=$_POST['ced'];
$id=$_POST['id'];

error_reporting(0);

$consulta="select rc.id_retencion_compra, rc.ret_num_serie||'-'||rc.ret_num_retencion as numeroretencion, rc.ret_fecha_emision, rc.ret_impuesto_retenido,
fc.serie_factura||'-'||fc.num_factura as numerofactura, rc.clave_acceso, s.sucursal
from tbl_retencion_compra rc, tbl_factura_compra fc, tbl_proveedor p, tbl_sucursal s
where estado_documento='a' and rc.id_factura_compra=fc.id_factura_compra and fc.id_proveedor=p.id_proveedor
and rc.documento_xml is not null and rc.documento_xml not in ('') and rc.documento='f'
and p.id_proveedor in (".$id.") and rc.anulado=false and s.id_sucursal=rc.id_sucursal
order by rc.ret_fecha_emision desc;";
$resultado=pg_query($consulta) or die (pg_last_error());

if(pg_num_rows($resultado)==0){

echo '<b>No tiene Retenciones Facturación</b>';

}else{
echo "<div class='uk-overflow-container'>";
	echo '<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">';
		echo "<thead>";
			echo "<tr>";
				echo "<th>Sucursal</th>";
				echo "<th>Nº de Factura</th>";
				echo "<th>Nº de Retencion</th>";
				echo "<th>Fecha Emisión</th>";
				echo "<th>Total</th>";
				echo "<th>Pdf</th>";
				echo "<th>Xml</th>";
			echo "</tr>";
		echo "</thead>";

while($fila=pg_fetch_array($resultado)){
	echo '<tbody>';
		echo '<tr>';
			echo '<td>';
			echo $fila[6];
			echo '</td>';
			echo '<td>';
			echo $fila[4];
			echo '</td>';
			echo '<td>';
			echo $fila[1];
			echo '</td>';
			echo '<td>';
			echo $fila[2];
			echo '</td>';
			echo '<td>';
			echo $fila[3];
			echo '</td>';
			echo '<td>';
			echo '<a class="uk-icon-button uk-icon-file-pdf-o"  onClick="generarPdf(\''.$fila[5].'\',7);"></a>';
			echo '</td>';
			echo '<td>';
			echo '<a class="uk-icon-button uk-icon-file-code-o"  onClick="generarXml(\''.$fila[0].'\');"></a>';
			echo '</td>';
		echo '</tr>';
	echo '</tbody>';
}
	echo "</table>";
echo "</div>";
}

?>