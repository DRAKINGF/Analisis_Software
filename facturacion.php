<?php
session_start();

require 'conexion/conexion.php';
include_once("componentes/header.php");
include_once("componentes/navBarVertical.php"); 
include_once("componentes/navBar.php");
$cargo=$_SESSION['user_cargo']; 
if(!empty($_GET["accion"])) 
{
switch($_GET["accion"]) 
{
	case "agregar":
		if(!empty($_POST["txtcantidad"])) 
		{
			$codproducto = $usar_db->vaiQuery("SELECT * FROM producto WHERE cod_producto='" . $_GET["cod_producto"] . "'");
			$items_array = array($codproducto[0]["cod_producto"]=>array(
			'vai_nom'		=>$codproducto[0]["nombre"], 
			'vai_cod'		=>$codproducto[0]["cod_producto"], 
			'txtcantidad'	=>$_POST["txtcantidad"], 
			'vai_pre'		=>$codproducto[0]["precio"], 
			));
			
			if(!empty($_SESSION["items_carrito"])) 
			{
				if(in_array($codproducto[0]["cod_producto"],
				array_keys($_SESSION["items_carrito"]))) 
				{
					foreach($_SESSION["items_carrito"] as $i => $j) 
					{
							if($codproducto[0]["cod_producto"] == $i) 
							{
								if(empty($_SESSION["items_carrito"][$i]["txtcantidad"])) 
								{
									$_SESSION["items_carrito"][$i]["txtcantidad"] = 0;
								}
								$_SESSION["items_carrito"][$i]["txtcantidad"] += $_POST["txtcantidad"];
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
	echo "<script> alert('Gracias por su compra - VaidrollTeam');window.location= 'productos.php' </script>";
		unset($_SESSION["items_carrito"]);
	
	break;	
}
}

?>

                <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-center">
                            <h6 class="m-0 font-weight-bold text-success">Lista de productos</h6>
                            </div>
                            <div class="float-sm-right">
                            <button type="button" class="btn btn-success submitBtn" data-toggle="modal" data-target="#exampleModalLong">agregar productos</button>
                            </div>
                          <!--  <a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a>-->
                        </div>
                        

                                <div class="card-body">
                                    <div class="table-responsive">
                                 <!-- Topbar Search -->
                                 <form method="POST"
                                        class="offset-md-8 navbar-search">
                                        <div class="input-group">
                                            <input type="text"  class="form-control bg-light border-0 small" placeholder="Buscar Producto"
                                                aria-label="Search" aria-describedby="basic-addon2" id="txtbuscar" name="txtbuscar">
                                            <div class="input-group-append">
                                                <button   class="btn btn-success" type="submit" id="btnbuscar" name="btnbuscar">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </form>
 

                                        <?php
                                        /*

                                        require_once __DIR__ . '/vendor/autoload.php';

                                        $mpdf = new \Mpdf\Mpdf();

                                        $mpdf->WriteHTML('<h1>Mostrando una imagen</h1>');
                                        $mpdf->Output();
                                        */
                                        ?>  
                                        
                                <table class="display" id="example" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Stok</th>
                                            <th>Precio Unitario</th>
                                            <th>Descripcion</th>
                                            <th>Proveedor</th>
                                            <th>Empleado</th>
                                            <th>Acción</th>

                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                          $queryproducto = pg_query($conexion, "SELECT * FROM productos INNER JOIN registrar_productos ON registrar_productos.id_producto=productos.id_producto
                                          INNER JOIN usuarios ON registrar_productos.id_usuario=usuarios.id_usuario
                                          INNER JOIN proveedores ON registrar_productos.id_proveedor=proveedores.id_proveedor ORDER BY codigo_prod asc");
                                          $queryproveedor = pg_query($conexion, "SELECT * FROM proveedores");
                                          $queryadministrador = pg_query($conexion, "SELECT * FROM usuarios");
                                        
                                        if(isset($_POST['btnbuscar']))
                                           {
                                            $buscar = $_POST['txtbuscar'];
                                             if(pg_fetch_array($queryproveedor)){
                                                $queryproducto = pg_query($conexion, "SELECT * FROM productos INNER JOIN registrar_productos ON registrar_productos.id_producto=productos.id_producto
                                                INNER JOIN usuarios ON registrar_productos.id_usuario=usuarios.id_usuario
                                                INNER JOIN proveedores ON registrar_productos.id_proveedor=proveedores.id_proveedor 
                                                where nombre_prod = '$buscar' or codigo_prod = '$buscar' ");
                                            }else{
                                               //echo "<script> alert('No Se encontro el producto consultado');window.location= 'tables.php' </script>";
                                            }
                                             
                                             }
                                             else
                                            {
                                                $queryproducto = pg_query($conexion, "SELECT * FROM productos INNER JOIN registrar_productos ON registrar_productos.id_producto=productos.id_producto
                                                INNER JOIN usuarios ON registrar_productos.id_usuario=usuarios.id_usuario
                                                INNER JOIN proveedores ON registrar_productos.id_proveedor=proveedores.id_proveedor");
                                             }
                                        $numerofila = 0;
                                        $i=0;
                                        while($mostrar = pg_fetch_array($queryproducto)) 
                                        {    $numerofila++;
                                            
                                           //echo "<br>";
                                            //print_r($mostrar);
                                          // echo "<br>";
                                            $is1="".$mostrar['24'];
                                            $nameproveedor1 = $mostrar['24'];
                                            //print_r($nameproveedor1);
                                            //echo "<br>";
                                            $is2="".$mostrar['nombre1_usu'];
                                            $nameadministrador1 = $mostrar['nombre1_usu'];
                                            //print_r($nameadministrador1);
                                            //echo "<br>";
                                            echo "<tr>";
                                            
                                            $i++;
                                            ?>
                                             <td><?php echo $i; ?></td>
                                            <td><?php echo $mostrar['codigo_prod']; ?></td>
                                            <td><?php echo $mostrar['nombre_prod']; ?></td>
                                            <td><?php echo $mostrar['cantidad_prod']; ?></td>
                                            <td><?php echo $mostrar['precio_prod']; ?></td>
                                            <td><?php echo $mostrar['descripcion_prod']; ?></td>
                                            <td><?php echo $nameproveedor1; ?></td>
                                            <td><?php echo $nameadministrador1; ?></td>
                                            <td>
                                            <a   class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#formActulizar<?php echo $mostrar['codigo_prod']; ?>" onClick="">
                                            <i class="fas fa-edit"></i>
                                            </a>
                                            <!--
                                            <a class="btn btn-danger btn-circle btn-sm" href="modal/eliminar.php?cod=<?php echo $mostrar['id_producto']; ?>" onClick="return confirm('¿Estás seguro de eliminar a <?php echo $mostrar['nombre_prod'];?>?')">
                                            <i class="fas fa-trash"></i>
                                            </a>
                                            -->
                                          </td>

                    <!-- Modal actualizar empleado-->
                    <div class="modal fade" id="formActulizar<?php echo $mostrar['codigo_prod']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formActulizarTitle">Actualizar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <p class="statusMsg"></p>
                                <form action="Modal/modificar.php" method="POST" role="form">
                                <div class="form-group">
                                                    <label for="inputCod">Codigo Producto</label>
                                                    <input type="text" class="form-control" id="inputName" name="txtcodigo" value="<?php echo $mostrar['codigo_prod']; ?>" placeholder="Ingresa codigo producto" required="" readonly/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNom">Nombre Producto</label>
                                                    <input type="text" class="form-control" id="inputName"  name="txtnombre" value="<?php echo $mostrar['nombre_prod'];?>"  placeholder="Ingrese nombre" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPre">Precio Producto</label>
                                                    <input type="number" class="form-control" id="inputPrice" name="txtprecio" value="<?php echo $mostrar['precio_prod']; ?>"  placeholder="Ingrese Precio" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMessage">Stock Producto</label>
                                                    <input type="text" class="form-control" id="inputStock"  name="txtstock" value="<?php echo $mostrar['cantidad_prod']; ?>"  placeholder="Ingrese stock Producto" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMessage">Descripcion Producto</label>
                                                    <input type="text" class="form-control" id="inputDescripcion"  name="txtdescripcion" value="<?php echo $mostrar['descripcion_prod']; ?>" placeholder="Ingrese descripcion Producto" required=""/>
                                                </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary submitBtn" name="btnregistrar" value="Actualizar" onClick="javascript: return confirm('¿Deseas actualizar este empleado?');">
                                       </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        <!-- finModal -->


                                          <?php
                                            /*echo "<td style='width:26%'><a data-toggle=modal data-target=#formModal2 cod=$mostrar[cod_producto]\">dd</a> | <a href=\"modal/eliminar.php?cod=$mostrar[cod_producto]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a></td>"; */          
                                            
                                        }
                                         
                                        ?>
                                    

                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.container-fluid -->

                       <!-- Modal añadir producto-->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Añadir producto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <p class="statusMsg"></p>
                                <form action="Modal/agregar.php" method="POST" role="form">
                                                <div class="form-group">
                                                    <label for="inputCod">Codigo Producto</label>
                                                    <input type="text" class="form-control" id="inputName" name="txtcodigo" placeholder="Ingresa codigo producto" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNom">Nombre Producto</label>
                                                    <input type="text" class="form-control" id="inputName"  name="txtnombre" placeholder="Ingrese nombre" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPre">Precio Producto</label>
                                                    <input type="number" class="form-control" id="inputPrice" name="txtprecio" placeholder="Ingrese Precio" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMessage">Stock Producto</label>
                                                    <input type="text" class="form-control" id="inputStock"  name="txtstock" placeholder="Ingrese stock Producto" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMessage">Descripcion Producto</label>
                                                    <input type="text" class="form-control" id="inputDescripcion"  name="txtdescripcion" placeholder="Ingrese descripcion Producto" required=""/>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="asig_id">Proveedor</label>
                                                                <select class="form-control" name="id_prov" id="id_prov">
                                                                    <option value="">Selecionar proveedor</option>
                                                                    <?php
                                                                        $queryproveedor = pg_query($conexion, "SELECT * FROM proveedores");
                                                                        $numerofila = 0;
                                                                        while($mostrar2 = pg_fetch_array($queryproveedor)) 
                                                                        {    
                                                                            $numerofila++;
                                                                            echo "<option value=".$mostrar2['id_proveedor'].">".strtoupper(strtolower($mostrar2['nombre_prov']))."</option>";
                                                                        }   
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        </div>     

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <input type="submit" class="btn btn-primary submitBtn" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este producto?');">
                                    
                                        </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        <!-- finModal -->

            </div>
            <!-- End of Main Content -->

            <?php include_once("componentes/footer.php");?>