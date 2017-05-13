<?php
include 'conexion.php';
conectarse();
//Inicio de variables de sesión
session_start();
//Recibir los datos ingresados en el formulario
$cedula= $_POST['cedula'];
$tipo= $_POST['tipo'];
$idc='';


//Consultar si los datos son están guardados en la base de datos
if(strcmp($tipo, "1")==0){
	$consulta="select id_cliente, ruc, razon_social from tbl_cliente where ruc='".$cedula."'";
	$resultado=pg_query($consulta) or die (pg_last_error());

	if(pg_num_rows($resultado)==0){ //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
		echo '<div class="uk-alert uk-alert-danger">Usuario no Encontrado</div>';
	}

	else{ //opcion2: Usuario logueado correctamente

		while($fila=pg_fetch_array($resultado)){
			$idc .= $fila['id_cliente'].",";
			$_SESSION['ced'] = $fila['ruc'];
			$_SESSION['nombres'] = $fila['razon_social'];
		}
		$_SESSION['id']=substr($idc, 0, -1);
		//Definimos las variables de sesión y redirigimos a la página de usuario
		//header('Location: ../../pags/facturaElectronica/clientes.php');
		echo "0";
		//echo '<div class="uk-alert"><a target="_blank" href="../../pags/facturaElectronica/clientes.php">Click Aqui</a></div>';
		//header("Location: ../../pags/facturaElectronica/clientes.html");
	}
}

if(strcmp($tipo, "2")==0){
	$consulta="select id_proveedor, ruc, razon_social from tbl_proveedor where ruc='".$cedula."'";
	$resultado=pg_query($consulta) or die (pg_last_error());

	if(pg_num_rows($resultado)==0){ //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
		echo '<div class="uk-alert uk-alert-danger">Proveedor no Encontrado</div>';
	}

	else{ //opcion2: Usuario logueado correctamente

		//Definimos las variables de sesión y redirigimos a la página de usuario
		while($fila=pg_fetch_array($resultado)){
			$idc .= $fila['id_proveedor'].",";
			$_SESSION['ced'] = $fila['ruc'];
			$_SESSION['nombres'] = $fila['razon_social'];
		}
		$_SESSION['id']=substr($idc, 0, -1);
		echo "0";
		//header("Location: Proveedor.html");
	}
}

?>