<?php
require_once 'dompdf/dompdf_config.inc.php';
require_once('barcode.inc.php'); 
//$conexion = mysqli_connect("localhost","sqlServer","root","fak_electronica");
include 'conexion.php';
$conexion=conectarse();
//$q=($_GET['geu']);
$claveFac=$_GET['claveFac'];
$id=$_GET['id'];

//error_reporting(0);

$carga_xml = "";
$tipo_factura = "";
$fechaEmision = "";
$dirEstablecimiento = "";
$contribuyenteEspecial = "";
$obligadoContabilidad = "";
$razonSocialComprador = "";
$identificacionComprador = "";
$razonSocialComprador = "";
$razonSocialComprador = "";
$valorSum = "";

$Doc = "";

new barCodeGenrator($claveFac,1,'barcode/'.$claveFac.'.jpg', 500, 80, true);
if(strcmp($id, "1")==0){
	$consulta="select documento_xml, total from tbl_factura_venta where clave_acceso='".$claveFac."'";
}
if(strcmp($id, "4")==0){
	$consulta="select documento_xml, total from vta_nota_credito_venta where clave_acceso='".$claveFac."'";
}
if(strcmp($id, "7")==0){
	$consulta="select documento_xml, ret_impuesto_retenido as total from tbl_retencion_compra rc where rc.clave_acceso='".$claveFac."'";
}


$resultado=pg_query($conexion,$consulta);

while($fila = pg_fetch_assoc($resultado)){
	$valorSum=$fila['total'];
	$carga_xml=simplexml_load_string($fila['documento_xml']);
}

$numeroAutorizacion=$carga_xml->numeroAutorizacion;
$fechaAutorizacion=$carga_xml->fechaAutorizacion;
$getXml=$carga_xml->comprobante;

$get2=new simplexmlElement($getXml);

//infoTributaria
$ambiente=$get2->infoTributaria->ambiente;
$tipoEmision=$get2->infoTributaria->tipoEmision;
$razonSocial=$get2->infoTributaria->razonSocial;
$nombreComercial=$get2->infoTributaria->nombreComercial;
$ruc=$get2->infoTributaria->ruc;
$codDoc=$get2->infoTributaria->codDoc;
$estab=$get2->infoTributaria->estab;
$ptoEmi=$get2->infoTributaria->ptoEmi;
$secuencial=$get2->infoTributaria->secuencial;
$dirMatriz=$get2->infoTributaria->dirMatriz;

//PArametros para los totales
$subTotal14="0.00";
$subTotal0="0.00";
$subTotalExcentoIva="0.00";
$iva12="0.00";
$PorcentajeIVA="0%";

//infoFactura
if(strcmp($codDoc, "01")==0){
	$Doc="F A C T U R A";
	$fechaEmision=$get2->infoFactura->fechaEmision;
	$dirEstablecimiento=$get2->infoFactura->dirEstablecimiento;
	$contribuyenteEspecial=$get2->infoFactura->contribuyenteEspecial;	
	$obligadoContabilidad=$get2->infoFactura->obligadoContabilidad;	
	$razonSocialComprador=$get2->infoFactura->razonSocialComprador;
	$identificacionComprador=$get2->infoFactura->identificacionComprador;
	
	$totalSinImpuestos=$get2->infoFactura->totalSinImpuestos;	
	$totalDescuento=$get2->infoFactura->totalDescuento;	
	$importeTotal=$get2->infoFactura->importeTotal;
	$codigoPorcentaje=$get2->infoFactura->totalConImpuestos->totalImpuesto->codigoPorcentaje;
	$baseImponible=$get2->infoFactura->totalConImpuestos->totalImpuesto->baseImponible;
	$valor=$get2->infoFactura->totalConImpuestos->totalImpuesto->valor;
	$tipoPago=0;
	$valorPago=0;
	$result = $get2->xpath('//pagos');
	//var_dump($result);
	if($result){
		$tipoPago=$get2->infoFactura->pagos->pago->formaPago;
		
		$consultaPagos="select descripcion from tbl_forma_pago where codigo='".$tipoPago."' order by id_forma_pago limit 1";
		$resultadoPagos=pg_query($conexion,$consultaPagos);

		while($filapagos = pg_fetch_assoc($resultadoPagos)){
			$tipoPago=$filapagos['descripcion'];
		}
		$valorPago=$get2->infoFactura->pagos->pago->total;
	}
	

	/*if(strcmp($codigoPorcentaje,"0")==0){
		$subTotal0=$baseImponible;
		$subTotalExcentoIva=$valor;
	}
	if(strcmp($codigoPorcentaje,"2")==0){
		$PorcentajeIVA="12%";
		$subTotal14=$baseImponible;
		$iva12=$valor;
	}
	if(strcmp($codigoPorcentaje,"3")==0){
		$PorcentajeIVA="14%";
		$subTotal14=$baseImponible;
		$iva12=$valor;
	}*/
}

if(strcmp($codDoc, "04")==0){
	$Doc="NOTA DE CREDITO";
	$dirEstablecimiento=$get2->infoNotaCredito->dirEstablecimiento;
	$obligadoContabilidad=$get2->infoNotaCredito->obligadoContabilidad;
	$razonSocialComprador=$get2->infoNotaCredito->razonSocialComprador;
	$identificacionComprador=$get2->infoNotaCredito->identificacionComprador;
	$fechaEmision=$get2->infoNotaCredito->fechaEmision;
	$numDocModificado=$get2->infoNotaCredito->numDocModificado;
	$fechaEmisionDocSustento=$get2->infoNotaCredito->fechaEmisionDocSustento;
	$motivo=$get2->infoNotaCredito->motivo;
	$totalSinImpuestos=$get2->infoNotaCredito->totalSinImpuestos;

	$codigoPorcentaje=$get2->infoNotaCredito->totalConImpuestos->totalImpuesto->codigoPorcentaje;
	$baseImponible=$get2->infoNotaCredito->totalConImpuestos->totalImpuesto->baseImponible;
	$valor=$get2->infoNotaCredito->totalConImpuestos->totalImpuesto->valor;
	//$totalDescuento=$get2->infoNotaCredito->detalles->detalle->descuento;
	$totalDescuento="0.00";
	$importeTotal=$get2->infoNotaCredito->valorModificacion;
	$codDocModificado=$get2->infoNotaCredito->codDocModificado;
	$DocModificado="";

	if(strcmp($codDocModificado,"01")==0){
		$DocModificado="FACTURA";
	}
	if(strcmp($codDocModificado,"04")==0){
		$DocModificado="NOTA DE CRÉDITO";
	}
	if(strcmp($codDocModificado,"05")==0){
		$DocModificado="NOTA DE DÉBITO";
	}
	if(strcmp($codDocModificado,"06")==0){
		$DocModificado="GUÍA DE REMISIÓN";
	}
	if(strcmp($codDocModificado,"07")==0){
		$DocModificado="COMPROBANTE DE RETENCIÓN";
	}
}

if(strcmp($codDoc, "07")==0){
	$Doc="COMPROBANTE DE RETENCION";
	$fechaEmision=$get2->infoCompRetencion->fechaEmision;
	$dirEstablecimiento=$get2->infoCompRetencion->dirEstablecimiento;
	$contribuyenteEspecial=$get2->infoCompRetencion->contribuyenteEspecial;	
	$obligadoContabilidad=$get2->infoCompRetencion->obligadoContabilidad;	
	$razonSocialComprador=$get2->infoCompRetencion->razonSocialSujetoRetenido;
	$identificacionComprador=$get2->infoCompRetencion->identificacionSujetoRetenido;
	$periodoFiscal=$get2->infoCompRetencion->periodoFiscal;	
}

$infoEmail="";
$infoDireccion="";
$infoArcotel="";

foreach ($get2->infoAdicional[0]->campoAdicional as $campoAdicional) {
    switch((string) $campoAdicional['nombre']) { // Obtener los atributos como índices del elemento
    case 'EMAIL':
        $infoEmail= $campoAdicional;
        break;
    case 'DIRECCION':
        $infoDireccion=$campoAdicional;
        break;
    case 'ARCOTEL':
        $infoArcotel=$campoAdicional;
        break;
    }
}

if(strcmp($ambiente,"1")==0){
	$ambiente="Pruebas";
}
if(strcmp($ambiente,"2")==0){
	$ambiente="Producción";
}

if(strcmp($tipoEmision,"1")==0){
	$tipoEmision="Emisión Normal";
}
if(strcmp($tipoEmision,"2")==0){
	$tipoEmision="Emisión por Indisponibilidad del Sistema";
}



# Contenido HTML del documento que queremos generar en PDF.
$html='
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>SAITEL Factura Electrónica</title>
	</head>
	<body style="font-size:15px">

	<!--Info General*/-->
		 <table style="width : 100%;"> 
		 <tr> 
		 	<td width="49%" style="border: 1px solid black" valign="top">
		 		<table>
		 			<tr>
		 				<td>
			 				<table>
					 			<tr align=center>
					 				<td colspan="2"><img src="../../images/logosfondo.png" WIDTH="300px"></td>
					 			</tr>
					 			<tr align=center>
					 				<td colspan="2">'.$razonSocial.'</td>
					 			</tr>
					 			<br>
					 			<tr>
					 				<td valign="top" width="40%">Dirección Matriz:</td>
					 				<td width="60%">'.$dirMatriz.'</td>
					 			</tr>
					 			<tr>
					 				<td valign="top" width="40%">Dirección Sucursal: </td>
					 				<td width="60%">'.$dirEstablecimiento.'</td>
					 			</tr>';
					 			if(strcmp($contribuyenteEspecial,"")!=0){
					 				$html.='<tr>
							 					<td colspan="2">Contribuyente Especial Nro. '.$contribuyenteEspecial.'</td>
							 			   </tr>';
					 			}
					 	$html.='<tr>
					 				<td colspan="2">OBLIGADO A LLEVAR CONTABILIDAD: '.$obligadoContabilidad.'</td>
					 			</tr>
					 		</table>
		 				</td>
		 			</tr>
		 		</table>
		 	</td>
		 	<td width="2%"></td>
		 	<td width="49%" style="border: 1px solid black" valign="top">
		 		<table>
		 			<tr>
		 				<td>
			 				<table>
					 			<tr>
					 				<td>R.U.C: '.$ruc.'</td>
					 			</tr>
					 			<tr>
					 				<td>'.$Doc.'</td>
					 			</tr>
					 			<tr>
					 				<td>No. '.$estab.'-'.$ptoEmi.'-'.$secuencial.'</td>
					 			</tr>
					 			<tr>
					 				<td>NÚMERO DE AUTORIZACIÓN</td>
					 			</tr>
					 			<tr>
					 				<td>'.$numeroAutorizacion.'</td>
					 			</tr>
					 			<tr>
					 				<td>FECHA Y HORA DE AUTORIZACION</td>
					 			</tr>
					 			<tr>
					 				<td>'.$fechaAutorizacion.'</td>
					 			</tr>
					 			<tr>
					 				<td>AMBIENTE: '.$ambiente.'</td>
					 			</tr>
					 			<tr>
					 				<td>EMISIÓN: '.$tipoEmision.'</td>
					 			</tr>
					 			<tr>
					 				<td>CLAVE DE ACCESO</td>
					 			</tr>
					 			<tr>
					 				<td><img src="barcode/'.$claveFac.'.jpg" WIDTH="330px"></td>
					 			</tr>
					 		</table>
		 				</td>
		 			</tr>
		 		</table>
		 	</td>
		 </tr> 
		</table>
		<br>

		<!--Info del Cliente*/-->
		<table border="0.2" style="width : 100%;"> 
		 <tr> 
			 <td>
			 	<table style="width : 100%;">
				 	<tr>
					 	<td width="30%" valign="top">Razón Social / Nombres y Apellidos:</td>
					 	<td width="45%" valign="top">'.$razonSocialComprador.'</td>
					 	<td width="25%" valign="top">RUC/CI: '.$identificacionComprador.'</td>
				 	</tr>
				 	<tr>
					 	<td valign="top">Fecha de emisión: '.$fechaEmision.'</td>
					 	<td valign="top" colspan=2>'.$infoDireccion.'</td>
				 	</tr>';
		if(strcmp($codDoc, "04")==0){
			$html.='<tr>
						<td valign="top" colspan=3 align="center">-------------------------------------------------------------------------------</td>
					</tr>
					<tr>
						<td valign="top">Comprobante que se Modifica:</td>
						<td valign="top" colspan=2>'.$DocModificado.': '.$numDocModificado.'</td>
					</tr>
					<tr>
						<td valign="top">Fecha emisión (Comprobante a Modificar)</td>
						<td valign="top" colspan=2>'.$fechaEmisionDocSustento.'</td>
					</tr>
					<tr>
						<td valign="top">Razón de Modificación:</td>
						<td valign="top" colspan=2>'.$motivo.'</td>
					</tr>';
		}
		$html.='</table>
		 	</td>
		 </tr>
		</table>';

		if(strcmp($codDoc, "01")==0||strcmp($codDoc, "04")==0){
			$html.='<!--Detalle*/-->
				<br>
				<table border="0.2" style="width : 100%;border-collapse: collapse;">
					<tr align=center>
						<td width="10%">Cod. Principal</td>
						<td width="8%">Cant.</td>
						<td width="12%">Descripción</td>
						<td width="46%">Detalle Adicinal</td>
						<td width="10%">Precio Unitario</td>
						<td width="7%">Desc.</td>
						<td width="7%">Total</td>
					</tr>';

			foreach ($get2->detalles->detalle as $detalle) 
			{
				$codigo=$detalle->impuestos->impuesto->codigo;

				if(strcmp($codigo, "1")==0){
					$codigo='RENTA';
				}
				if(strcmp($codigo, "2")==0){
					$codigo='IVA';
				}
				if(strcmp($codigo, "6")==0){
					$codigo='ISD';
				}
				$html.='<tr>
						<td>'.$detalle->codigoPrincipal.'</td>
						<td>'.$detalle->cantidad.'</td>
						<td>'.$codigo.' '.$detalle->impuestos->impuesto->tarifa.'</td>
						<td>'.$detalle->descripcion.'</td>
						<td align=right>'.$detalle->precioUnitario.'</td>
						<td align=right>'.$detalle->descuento.'</td>
						<td align=right>'.$detalle->precioTotalSinImpuesto.'</td>
					</tr>';
			}
			$html.='</table>';
		}

		if(strcmp($codDoc, "07")==0){
			$html.='<!--Detalle*/-->
				<br>
				<table border="0.2" style="width : 100%;border-collapse: collapse;">
					<tr align=center>
						<td width="10%">Comprobante</td>
						<td width="20%">Número</td>
						<td width="15%">Fecha Emisión</td>
						<td width="10%">Ejercicio Fiscal</td>
						<td width="20%">Base Imponible para la retencion</td>
						<td width="10%">Impuesto</td>
						<td width="15%">Porcentaje de Retención</td>
						<td width="10%">Valor Retenido</td>
					</tr>';

			foreach ($get2->impuestos->impuesto as $impuesto) 
			{
				$codigo=$impuesto->codigo;
				$codDocSustento=$impuesto->codDocSustento;

				if(strcmp($codigo, "1")==0){
					$codigo='RENTA';
				}
				if(strcmp($codigo, "2")==0){
					$codigo='IVA';
				}
				if(strcmp($codigo, "6")==0){
					$codigo='ISD';
				}

				if(strcmp($codDocSustento, "01")==0){
					$codDocSustento='FACTURA';
				}
				if(strcmp($codDocSustento, "02")==0){
					$codDocSustento='NOTA DE VENTA';
				}
				if(strcmp($codDocSustento, "03")==0){
					$codDocSustento='LIQUIDACIÓN DE COMPRAS O SERVICIOS';
				}
				if(strcmp($codDocSustento, "04")==0){
					$codDocSustento='NOTA DE CRÉDITO';
				}
				if(strcmp($codDocSustento, "05")==0){
					$codDocSustento='NOTA DE DÉBITO';
				}
				if(strcmp($codDocSustento, "06")==0){
					$codDocSustento='GUÍA DE REMISION';
				}
				if(strcmp($codDocSustento, "07")==0){
					$codDocSustento='COMPROBANTE DE RETENCIÓN';
				}

				$html.='<tr>
						<td>'.$codDocSustento.'</td>
						<td>'.$impuesto->numDocSustento.'</td>
						<td>'.$fechaEmision.'</td>
						<td>'.$periodoFiscal.'</td>
						<td>'.$impuesto->baseImponible.'</td>
						<td>'.$codigo.'</td>
						<td>'.$impuesto->porcentajeRetener.'</td>
						<td>'.$impuesto->valorRetenido.'</td>
					</tr>';
			}
			$html.='<tr>
						<td colspan=7>Valor Retenido</td>
						<td>'.$valorSum.'</td>
					</tr>
				</table>';
		}

$html.='<!--Informacion*/-->
		<br>
		<table style="width : 100%;"> 
		 <tr> 
		 	<td width="40%" style="border: 1px solid black" valign="top">
		 		<table>
		 			<tr>
		 				<td>
			 				<table>
					 			<tr align=center>
					 				<td colspan="2">Información Adicional</td>
					 			</tr>
					 			<tr>
					 				<td valign="top" width="40%">Contacto: </td>
					 				<td valign="top">062609177 / 062610330</td>
					 			</tr>
					 			<tr>
					 				<td valign="top" width="40%">Email:</td>
					 				<td valign="top">'.$infoEmail.'</td>
					 			</tr>
					 			<tr>
					 				<td valign="top" width="40%">Sitio Web: </td>
					 				<td valign="top">www.saitel.ec</td>
					 			</tr>';
					 		if($result){
$html.='						<tr>
					 				<td valign="top" width="40%">Tipo Pago: </td>
					 				<td valign="top">'.$tipoPago.'</td>
					 			</tr>
					 			<tr>
					 				<td valign="top" width="40%">Valor Pago: </td>
					 				<td valign="top">'.$valorPago.'</td>
					 			</tr>';
					 		}	
$html.='						<tr>
					 				<td>
					 				<br>
					 				</td>
					 			</tr>				 							 			
					 			
					 			<tr>
					 				<td valign="top" colspan="2">'.$infoArcotel.'</td>
					 			</tr>';
					 			

$html.='</table>
	</td>
	</tr>
	</table>
	</td>
	<td width="10%"></td>';

	if(strcmp($codDoc, "01")==0||strcmp($codDoc, "04")==0){
		$html.='<td width="50%" valign="top">
		 		<table border="0.2" style="width : 100%;border-collapse: collapse;">';

		 //Para los Subtotales
		foreach ($get2->infoFactura->totalConImpuestos->totalImpuesto as $totalImpuesto) 
			{
				foreach ($get2->detalles->detalle->impuestos->impuesto as $impuesto) 
				{
					if(strcmp($totalImpuesto->codigoPorcentaje,$impuesto->codigoPorcentaje)==0){
						if(strcmp($impuesto->codigoPorcentaje,"6")==0||strcmp($impuesto->codigoPorcentaje,"7")==0){
							if(strcmp($impuesto->codigoPorcentaje,"6")==0){
								$html.='<tr>
									<td width="70%">SUBTOTAL No Objeto de Impuesto</td>';
							}
							if(strcmp($impuesto->codigoPorcentaje,"7")==0){
								$html.='<tr>
									<td width="70%">SUBTOTAL Excento de IVA</td>';
							}
						 	$html.='<td width="30%" align=right>'.$totalImpuesto->baseImponible.'</td>
						 		</tr>';
						}
						else{
							$html.='<tr>
									<td width="70%">SUBTOTAL '.$impuesto->tarifa.'% </td>
						 			<td width="30%" align=right>'.$totalImpuesto->baseImponible.'</td>
						 		</tr>';
						}
					}
				}
			}

		//Para los IVAs
		foreach ($get2->infoFactura->totalConImpuestos->totalImpuesto as $totalImpuesto) 
			{
				foreach ($get2->detalles->detalle->impuestos->impuesto as $impuesto) 
				{
					if(strcmp($totalImpuesto->codigo,$impuesto->codigo)==0){
						if(strcmp($impuesto->codigo, "1")==0){
							$codigo='RENTA';
						}
						if(strcmp($impuesto->codigo, "2")==0){
							$codigo='IVA';
						}
						if(strcmp($impuesto->codigo, "6")==0){
							$codigo='ISD';
						}
						$html.='<tr>
									<td width="70%">'.$codigo.' '.$impuesto->tarifa.'% </td>
						 			<td width="30%" align=right>'.$totalImpuesto->valor.'</td>
						 		</tr>';
					}
				}
			}
		/*$html.='	<tr>
		 				<td width="70%">SUBTOTAL '.$PorcentajeIVA.' </td>
		 				<td width="30%" align=right>'.$subTotal14.'</td>
		 			</tr>
		 			<tr>
		 				<td>SUBTOTAL 0% </td>
		 				<td align=right>'.$subTotal0.'</td>
		 			</tr>
		 			<tr>
		 				<td>SUBTOTAL No objeto de IVA </td>
		 				<td align=right>0.00</td>
		 			</tr>
		 			<tr>
		 				<td>SUBTOTAL SIN IMPUESTOS  </td>
		 				<td align=right>'.$totalSinImpuestos.'</td>
		 			</tr>
		 			<tr>
		 				<td>SUBTOTAL Exento de IVA</td>
		 				<td align=right>'.$subTotalExcentoIva.'</td>
		 			</tr>
		 			<tr>
		 				<td>IVA '.$PorcentajeIVA.'</td>
		 				<td align=right>'.$iva12.'</td>
		 			</tr>';*/
		$html.='	<tr>
		 				<td>DESCUENTO</td>
		 				<td align=right>'.$totalDescuento.'</td>
		 			</tr>
					<tr>
						<td>VALOR TOTAL</td>
		 				<td align=right>'.$importeTotal.'</td>
		 			</tr>
		 		</table>
		 	</td>';
	}
	
 $html.='</tr> 
		</table>
	</body>
</html>';
 
# Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();
 
# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->set_paper("A4", "portrait");
 
# Cargamos el contenido HTML.
$mipdf ->load_html($html);

//aumentamos memoria del servidor si es necesario
ini_set("memory_limit","32M"); 

# Renderizamos el documento PDF.
$mipdf ->render();
 
# Enviamos el fichero PDF al navegador.
//$mipdf ->stream('FacturaElectronica ECAPASR.pdf', array("Attachment" => 0));
$mipdf ->stream($claveFac.'.pdf');
?>

?>