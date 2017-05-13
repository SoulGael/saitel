<?php
session_start();
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);
$ci=$_POST['1'];
$telefono=$_POST['2'];
$tipo=$_POST['3'];
$des=$_POST['4'];
$estado="";

error_reporting(0);

$consulta="select id_instalacion,razon_social,id_sucursal,telefono,estado_servicio from vta_instalacion where lower(ruc)='".$ci."'
and estado_servicio not in('t','r','d','e');";
$resultado=pg_query($consulta) or die (pg_last_error());

if(pg_num_rows($resultado)==0){

echo "<div class='uk-alert uk-alert-danger' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Cliente no Registrado,por favor verifique su Ruc o Cédula</p></div>";

}else{

while($fila=pg_fetch_array($resultado)){
	$estado=$fila[4];
	if(strcmp($estado,'p')==0){
		echo "<div class='uk-alert uk-alert-danger' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Su servicio está por instalar</p></div>";
	}
	if(strcmp($estado,'s')==0){
		echo "<div class='uk-alert uk-alert-danger' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Su servicio está suspendido</p></div>";
	}
	if(strcmp($estado,'c')==0){
		echo "<div class='uk-alert uk-alert-danger' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Su servicio está cortado</p></div>";
	}
	if(strcmp($estado,'n')==0){
		echo "<div class='uk-alert uk-alert-danger' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Su servicio está en central de riesgos</p></div>";
	}

	if(strcmp($estado,'a')==0){

		$consultaSoporte="select * from tbl_soporte where id_instalacion=".$fila[0]." and estado='r';";
		$resultadoSoporte=pg_query($consultaSoporte) or die (pg_last_error());
		if(pg_num_rows($resultadoSoporte)==0){
			pg_query("insert into tbl_soporte (id_instalacion, id_sucursal, num_soporte, quien_llama,telefono_llama,
			alias_contesta,problema,diagnostico,fecha_llamada,hora_llamada,tipo_soporte)
			values(".$fila[0].",".$fila[2].",(select max(num_soporte)+1 from tbl_soporte where id_sucursal='".$fila[2]."'),'".$fila[1]."','".$telefono."',
			'administrador','(WEB): ".$des."','',date 'now()',time 'now()',".$tipo.")")
			or die("<div class='uk-alert uk-alert-danger' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Problemas al guardar por favor, verifique los datos ó comuniquese con el administrador del sistema.</p></div>". pg_last_error());
			echo "<div class='uk-alert uk-alert-success' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Soporte Guardado Correctamente.</p></div>";
		}
		else{
			while($filaSoporte=pg_fetch_array($resultadoSoporte)){
				echo "<div class='uk-alert uk-alert-success' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Usted ya tiene Generado una orden de soporte, su número de ticket es es: '".$filaSoporte[2]."-".$filaSoporte[3]."'.</p></div>";
			}
		}
	}
  }
}

?>