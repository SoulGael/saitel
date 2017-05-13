<?php
include 'conexion.php';
$sucursales = array();
$conexion="select id_sucursal, sucursal from vta_sucursal";
$resultado=pg_query($conexion) or die (pg_last_error());

if(pg_num_rows($resultado)==0){

}else{
	$sucursales[0] = "Seleccione su Sucursal";
	while($fila=pg_fetch_array($resultado)){
		$sucursales[$fila['id_sucursal']] = $fila['sucursal'];
	}
	print_r(json_encode($sucursales));
}
?>