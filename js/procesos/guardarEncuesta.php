<?php
session_start();
include 'conexion.php';
conectarse();
//$q=($_GET['geu']);
$p1=$_POST['1'];
$p2=$_POST['2'];
$p3=$_POST['3'];
$p4=$_POST['4'];
$p5=$_POST['5'];

$c1=$_POST['c1'];
$c2=$_POST['c2'];
$c3=$_POST['c3'];
$c4=$_POST['c4'];
$c5=$_POST['c5'];

$nombre=$_POST['nom'];
$ci=$_POST['ci'];
$sucursal=$_POST['suc'];

error_reporting(0);

pg_query("insert into tbl_encuesta(id_sucursal, fecha, p1, p2, p3, p4, p5, c1, c2, c3, c4, c5, nombre,ci)
	values(".$sucursal.", date 'now()','".$p1."', '".$p2."', '".$p3."', '".$p4."', '".$p5."', '".$c1."', '".$c2."', '".$c3."', '".$c4."', '".$c5."', '".$nombre."', '".$ci."')") 
or die("<div class='uk-alert' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Problemas al guardar por favor, comuniquese con el administrador del sistema.</p></div>". pg_last_error());
	echo "<div class='uk-alert' data-uk-alert><a href='' class='uk-alert-close uk-close'></a><p>Gracias por su opinión</p></div>";

/*echo "<div class='uk-alert' data-uk-alert-warning><a href="" class='uk-alert-close uk-close'></a><p>EN ESTE MOMENTO ESTAMOS EN MANTENIMIENTO POR FAVOR INTENTELO MÁS TARDE POR FAVOR</p></div>";*/


?>