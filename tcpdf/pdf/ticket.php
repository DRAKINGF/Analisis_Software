<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

$fecha = substr($respuestaVenta["fecha"],0,-8);
$productos = json_decode($respuestaVenta["productos"], true);
$neto = number_format($respuestaVenta["neto"]);
$impuesto = number_format($respuestaVenta["impuesto"]);
$total = number_format($respuestaVenta["total"]);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage('P', 'A7');

//---------------------------------------------------------

$bloque1 = <<<EOF

<table style="font-size:9px; text-align:center">

	<tr>
		
		<td style="width:160px;">
	
			<div>

			<img src="images/logotipo.jpg" style="width:80px,height:80px">

			<br><br>
			
			<b>Fecha: $fecha

				<br><br>
				TECNIJHONKA
				<br>
				NIT: 71.759.963-9

				<br>
				SAN ALBERTO, CESAR

				<br>
				Teléfono: 317-607-3815

				<br>
				FACTURA N.$valorVenta</b> 

				<br><br>					
				<b>Cliente:</b>  $respuestaCliente[nombre]

				<br>
				<b>Vendedor:</b>  $respuestaVendedor[nombre]

				<br>

			</div>

		</td>

	</tr>


</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------


foreach ($productos as $key => $item) {

$valorUnitario = number_format($item["precio"]);

$precioTotal = number_format($item["total"]);

$bloque2 = <<<EOF

<table style="font-size:9px;">
<tr>
	
		<td style="width:160px;">
			 *******************************************
			
		</td>

	</tr>

	<tr>

	<td style="width:160px; text-align:left">
	<b>REPUESTOS:</b> 
	</td>

	</tr>
	<tr>
	
		<td style="width:160px;">
			 *******************************************
			
		</td>

	</tr>
	

	<tr>
	
		<td style="width:160px; text-align:left">
		$item[descripcion]
		</td>
		<td style="width:160px; text-align:right">
		
		<br>
		</td>

	</tr>

	<tr>
	
		<td style="width:160px; text-align:right">
		$ $valorUnitario * $item[cantidad] Und  = $ $precioTotal
		<br>
		</td>

	</tr>

</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque3 = <<<EOF

<table style="font-size:9px; text-align:right">

	<tr>
	
		<td style="width:160px;">
		*******************************************
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 TOTAL: 
		</td>

		<td style="width:80px;">
			$ $total
		</td>

	</tr>

	<tr>
	
		<td style="width:160px; text-align:center">
			<br>
			<br>
			<b>Muchas gracias por comprar con nosotros y preferirnos.</b>
			
	<br>
		</td>
	</tr>
	
	<tr>

		<td style="width: 53px;text-align:right">
		<img src="images/1.jpg" style="width:20px,height:20px">
		</td>
		<td style="width:53px;text-align:center">
		<img src="images/2.jpg" style="width:20px,height:20px">
		</td>
		<td style="width:53px;text-align:left">
		<img src="images/3.jpg" style="width:20px,height:20px">
		</td>
		
	</tr>

</table>



EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

//$pdf->Output('factura.pdf', 'D');
ob_end_clean();
$pdf->Output('factura.pdf');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();
?>