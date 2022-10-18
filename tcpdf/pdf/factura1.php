<?php
require_once('tcpdf_include.php');

class imprimirFactura{

public $codigo="0001";

public function traerImpresionFactura(){

    $itemVenta = "codigo";
    $valorVenta = $this->codigo;

    $codigoProducto="1111";
    $nombreProdcuto="Huevo xx";
    $descripcionProdccto="Huevos de tamaño considerables";
    
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->startPageGroup();
    
    $pdf->AddPage();

    $bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/logo.png" style="width:80px,height:80px"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					<b>AGROPECUARIA VENADILLO</b>

					<br>
					Dirección: Pcaña, Norte de Santander

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 314-251-5235
					
					<br>
					NIT: 91.779.963-9

				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:#40170E"><br><br>FACTURA N.<br>$valorVenta</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

ob_end_clean();
$pdf->Output('factura.pdf');


}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();