	<?php
session_start();
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);
$cedula=$_POST['ced'];
$id=$_POST['id'];
$desde=$_POST['desde'];
$hasta=$_POST['hasta'];


error_reporting(0);

$consulta="select id_nota_credito_venta, sucursal, numero_nota, fecha_emision, total, concepto,clave_acceso
	from vta_nota_credito_venta nc, tbl_sucursal s
	where id_cliente in (".$id.") and nc.anulado=false and documento_xml is not null and documento_xml not in ('') and estado_documento='a' and nc.id_sucursal=s.id_sucursal 
	and fecha_emision between '".$desde."' and '".$hasta."'
	order by fecha_emision desc;";
$resultado=pg_query($consulta) or die (pg_last_error());

if(pg_num_rows($resultado)==0){

echo '<b>No tiene Notas de Credito</b>';

}else{
echo "<div class='uk-overflow-container'>";
	echo '<table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">';
		echo "<thead>";
			echo "<tr>";
				echo "<th>Sucursal</th>";
				echo "<th>Nº de Nota</th>";
				echo "<th>Fecha Emisión</th>";
				echo "<th>Total</th>";
				echo "<th>Concepto</th>";
				echo "<th>Pdf</th>";
				echo "<th>Xml</th>";
			echo "</tr>";
		echo "</thead>";

while($fila=pg_fetch_array($resultado)){
	echo '<tbody>';
		echo '<tr>';
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
			echo $fila[4];
			echo '</td>';
			echo '<td>';
			echo $fila[5];
			echo '</td>';
			echo '<td>';
			echo '<a class="uk-icon-button uk-icon-file-pdf-o"  onClick="generarPdf(\''.$fila[6].'\',4);"></a>';
			echo '</td>';
			echo '<td>';
			echo '<a class="uk-icon-button uk-icon-file-code-o"  onClick="generarNotaXml(\''.$fila[0].'\');"></a>';
			echo '</td>';
		echo '</tr>';
	echo '</tbody>';
}
	echo "</table>";
echo "</div>";
}

?>