<?php
session_start();
require 'conexion/cone.php';
include_once("componentes/header.php");
include_once("componentes/navBarVertical.php"); 
include_once("componentes/navBar.php");
$cargo=$_SESSION['user_cargo']; 


$usar_db = new DBControl();


if(!empty($_GET["accion"])) 
{
switch($_GET["accion"]) 
{
	case "agregar":
		if(!empty($_POST["cantidad_prod"])) 
		{
			$codproducto = $usar_db->vaiQuery("SELECT * FROM productos WHERE codigo_prod='" . $_GET["codigo_prod"] . "'");
			$items_array = array($codproducto[0]["codigo_prod"]=>array(
			'vai_nom'		=>$codproducto[0]["nombre_prod"], 
			'vai_cod'		=>$codproducto[0]["codigo_prod"], 
			'cantidad_prod'	=>$_POST["cantidad_prod"], 
			'vai_pre'		=>$codproducto[0]["precio_prod"], 
			));
			
			if(!empty($_SESSION["items_carrito"])) 
			{
				if(in_array($codproducto[0]["codigo_prod"],
				array_keys($_SESSION["items_carrito"]))) 
				{
					foreach($_SESSION["items_carrito"] as $i => $j) 
					{
							if($codproducto[0]["codigo_prod"] == $i) 
							{
								if(empty($_SESSION["items_carrito"][$i]["cantidad_prod"])) 
								{
									$_SESSION["items_carrito"][$i]["cantidad_prod"] = 0;
								}
								$_SESSION["items_carrito"][$i]["cantidad_prod"] += $_POST["cantidad_prod"];
							}
					}
				} else 
				{
					$_SESSION["items_carrito"] = array_merge($_SESSION["items_carrito"],$items_array);
				}
			} 
			else 
			{
				$_SESSION["items_carrito"] = $items_array;
			}
		}
	break;
	case "eliminar":
		if(!empty($_SESSION["items_carrito"])) 
		{
			foreach($_SESSION["items_carrito"] as $i => $j) 
			{
				if($_GET["eliminarcode"] == $i)
				{
					unset($_SESSION["items_carrito"][$i]);	
				}			
				if(empty($_SESSION["items_carrito"]))
				{
					unset($_SESSION["items_carrito"]);
				}
			}
		}
	break;
	case "vacio":
		unset($_SESSION["items_carrito"]);
	break;	
	case "pagar":
	echo "<script> alert('Gracias por su compra - VaidrollTeam');window.location= 'fac.php' </script>";
		unset($_SESSION["items_carrito"]);
	
	break;	
}
}
?>


    <!-- Bootstrap core CSS -->
  <LINK REL=StyleSheet HREF="css/bootstrap.css" TYPE="text/css" MEDIA=screen>

    
    <!-- Custom styles for this template -->
    <link href="css/productos.css" rel="stylesheet">
  </head>
  <body>
  <?php include('conexion/conexion.php');?>

<div class="container py-3">
  <header>

  </header>

  <main>
    <div class="text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 text-white bg-primary border-primary">
            <h4 class="my-0 fw-normal">LISTADO DE PRODUCTOS</h4>
          </div>
  <?php
if(isset($_SESSION["items_carrito"]))
{
    $totcantidad = 0;
    $totprecio = 0;
?>	
      <div class="table-responsive">
        <table class="table table-bordered"  >
          <thead class="table-dark">
            <tr>
              <th scope="col">codigo</th>
              <th scope="col">Nombre</th>
              <th scope="col">cantidad</th>
              <th scope="col">precio unidad</th>
              <th scope="col">Valor</th>
              <th scope="col">Funcion</th>
            </tr>
          </thead>
          <?php

foreach ($_SESSION["items_carrito"] as $item){
  $item_price = $item["cantidad_prod"]*$item["vai_pre"];
?>
  <tr>
  <td><?php echo $item["vai_cod"]; ?></td>
  <td><?php echo $item["vai_nom"]; ?></td>
  <td><?php echo $item["cantidad_prod"]; ?></td>
  <td><?php echo "$ ".$item["vai_pre"]; ?></td>
  <td><?php echo "$ ". number_format($item_price,2); ?></td>
  <td><a href="fac.php?accion=eliminar&eliminarcode=<?php echo $item["vai_cod"]; ?>">Eliminar</a>
  <a href="fac.php?accion=vacio">Limpiar</a>
</td>
  </tr>
  <?php
  $totcantidad += $item["cantidad_prod"];
  $totprecio += ($item["vai_pre"]*$item["cantidad_prod"]);
}
?>

<tr style="background-color:#f3f3f3">
<td colspan="2"><b>Total de productos:</b></td>
<td><b><?php echo $totcantidad; ?></b></td>
<td colspan="2"><strong><?php echo "TOTAL $".number_format($totprecio, 2); ?></strong></td>
<td><a href="fac.php?accion=pagar">Pagar</a></td>
</tr>
          </tbody>
        </table>
        <?php
} else {
?>
<div align="center"><h3>¡La lista esta vacía!</h3></div>
<?php 
}
?>
      </div>
    </main>
  </div>


  <div class="contenedor_general">
	<?php
	$productos_array = $usar_db->vaiquery("SELECT * FROM productos ORDER BY nombre_prod ASC ");
	if (!empty($productos_array)) 
	{ 
		foreach($productos_array as $i=>$k)
		{
	?>
		<div class="contenedor_productos card shadow-sm">
			<form method="POST" action="fac.php?accion=agregar&codigo_prod=<?php echo $productos_array[$i]["codigo_prod"]; ?>">
			<div>

			<div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nombre_prod"]; ?></div>
			<div style="padding-top:10px;font-size:20px;"><?php echo "$".$productos_array[$i]["precio_prod"]; ?></div>
            
      <div><input type="text" name="cantidad_prod" value="1" size="2" /><input type="submit" value="Agregar" /></div>

			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>


</div>
        
          </div>
        </div>
      </div>



    
  </body>

</html>
<script>
    $(document).ready(function() {    
    $('#examplee').DataTable({  
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		]	        
    });     
});
</script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>



<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="popper/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
  
<!-- datatables JS -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>    
 
<!-- para usar botones en datatables JS -->  
<script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
 
<!-- código JS propìo-->    
<script type="text/javascript" src="mainn.js"></script>  
<script type="text/javascript" src="m1.js"></script>  
<?php include_once("componentes/footer.php");?>