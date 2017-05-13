<?php
session_start();
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);
$nombre=$_POST['2'];
$correo=$_POST['3'];
$telefono=$_POST['4'];

error_reporting(0);

$consulta="select * from tbl_registrosmark where telefono='".$telefono."' and fecha_reg=date 'now()';";
$resultado=pg_query($consulta) or die (pg_last_error());

if(pg_num_rows($resultado)==0){
	pg_query("insert into tbl_registrosmark (nombre, email, fecha_reg, telefono)
	values('".$nombre."','".$correo."',date 'now()','".$telefono."')")
	or die("<div class='uk-alert uk-alert-danger' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Problemas al guardar por favor, verifique los datos ó comuniquese con el administrador del sistema.</p></div>". pg_last_error());
	echo "<div class='uk-alert uk-alert-success' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Pedido Guardado Correctamente.</p></div>";

}else{
	echo "<div class='uk-alert uk-alert-danger' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Su número telefonico ya ha sido registrado el dia de hoy, por favor espere su llamada o vuelva a intentarlo mañana</p></div>";
}

?>