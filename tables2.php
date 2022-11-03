<?php
session_start();

require 'conexion/conexion.php';
include_once("componentes/header.php");
include_once("componentes/navBarVertical.php"); 
include_once("componentes/navBar.php");
$cargo=$_SESSION['user_cargo']; 


?>

                <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-center">
                            <h6 class="m-0 font-weight-bold text-success">Lista de productos</h6>
                            </div>
                            <div class="float-sm-right">
                            <button type="button" class="btn btn-success submitBtn" data-toggle="modal" data-target="#exampleModalLong">modal usuario</button>
                            </div>
                          <!--  <a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a>-->
                        </div>
                        

                                <div class="card-body">
                                    <div class="table-responsive">
                                 <!-- Topbar Search -->


                                <table class="display" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>doucumento</th>
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                            <th>Estado</th>
                                            <th>Acción</th>

                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                          $queryproducto = pg_query($conexion, "SELECT * FROM productos ORDER BY codigo_prod asc");
                                          $queryproveedor = pg_query($conexion, "SELECT * FROM proveedores");
                                          $queryadministrador = pg_query($conexion, "SELECT * FROM usuarios");
                                        
                                        if(isset($_POST['btnbuscar']))
                                           {
                                            $buscar = $_POST['txtbuscar'];
                                             if(pg_fetch_array($queryproveedor)){
                                                $queryproducto = pg_query($conexion, "SELECT * FROM productos INNER JOIN registrar_productos ON registrar_productos.id_producto=productos.id_producto where nombre_prod like '$buscar' or codigo_prod like '$buscar'");
                                            }else{
                                               //echo "<script> alert('No Se encontro el producto consultado');window.location= 'tables.php' </script>";
                                            }
                                             
                                             }
                                             else
                                            {
                                             $queryproducto = pg_query($conexion, "SELECT * FROM productos INNER JOIN registrar_productos ON registrar_productos.id_producto=productos.id_producto
                                             INNER JOIN usuarios ON registrar_productos.id_usuario=usuarios.id_usuario
                                             INNER JOIN proveedores ON registrar_productos.id_proveedor=proveedores.id_proveedor
                                              ORDER BY codigo_prod asc");
                                             }
                                        $numerofila = 0;
                                        $i=1;
                                        while($mostrar = pg_fetch_array($queryproducto)) 
                                        {    $numerofila++;
                                            print_r($mostrar);
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
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$mostrar['codigo_prod']."</td>";    
                                            echo "<td>".$mostrar['nombre_prod']."</td>";  
                                            echo "<td>".$mostrar['cantidad_prod']."</td>";
                                            echo "<td>".$mostrar['precio_prod']."</td>";
                                            echo "<td>".$mostrar['descripcion_prod']."</td>";
                                            echo "<td>".strtoupper($nameproveedor1)."</td>";
                                            echo "<td>".strtoupper($nameadministrador1)."</td>";
                                            $i++;
                                            ?>
                                            <td>
                                            <a   class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#formActulizar" onClick="")>
                                            <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-circle btn-sm" href="modal/eliminar.php?cod=<?php echo $mostrar['codigo_prod'] ?>" onClick="return confirm('¿Estás seguro de eliminar a <?php echo $mostrar['nombre_prod']?>?')">
                                            <i class="fas fa-trash"></i>
                                            </a>
                                          </td>
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
                                <h5 class="modal-title" id="exampleModalLongTitle">Añadir empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <p class="statusMsg"></p>
                                <form action="Modal/agregarEmp.php" method="POST" role="form">
                                    <div class="form-group">
                                        <label for="inputCod">Documento</label>
                                        <input type="text" class="form-control"  name="txtdoc" placeholder="Ingresa codigo producto" required=""/>
                                        <input type="hidden" class="form-control"  name="id_cargo" value="2"/>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer nombre</label>
                                        <input type="text" class="form-control"  name="nombre1" placeholder="Ingrese primer nombre" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo nombre</label>
                                        <input type="text" class="form-control"   name="nombre2" placeholder="Ingrese segundo nombre" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer apellido</label>
                                        <input type="text" class="form-control"  name="apellido1" placeholder="Ingrese primer apellido" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo apellido</label>
                                        <input type="text" class="form-control"  name="apellido2" placeholder="Ingrese segundo apellido" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPre">Telefono</label>
                                        <input type="number" class="form-control"  name="telefono" placeholder="Ingrese telefono" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">Contraseña</label>
                                        <input type="password" class="form-control"  name="pass" placeholder="Ingrese contraseña" required=""/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="asig_id">estado</label>
                                        <select class="form-control" name="estado" id="id_prov">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                            
                                        </select>
                                    </div>
                                       

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary submitBtn" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este empleado?');">
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        <!-- finModal -->

                    <!-- Modal actualizar empleado-->
                    <div class="modal fade" id="formActulizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <p class="statusMsg"></p>
                                <form action="Modal/agregar.php" method="POST" role="form">
                                <div class="form-group">
                                        <label for="inputCod">Documento</label>
                                        <input type="text" class="form-control"  name="txtdoc" placeholder="Ingresa codigo producto" required=""/>
                                        <input type="hidden" class="form-control"  name="id_cargo" value="2"/>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer nombre</label>
                                        <input type="text" class="form-control"  name="nombre1" placeholder="Ingrese primer nombre" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo nombre</label>
                                        <input type="text" class="form-control"   name="nombre2" placeholder="Ingrese segundo nombre" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Primer apellido</label>
                                        <input type="text" class="form-control"  name="apellido1" placeholder="Ingrese primer apellido" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Segundo apellido</label>
                                        <input type="text" class="form-control"  name="apellido2" placeholder="Ingrese segundo apellido" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPre">Telefono</label>
                                        <input type="number" class="form-control"  name="telefono" placeholder="Ingrese telefono" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">Contraseña</label>
                                        <input type="password" class="form-control"  name="pass" placeholder="Ingrese contraseña" required=""/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="asig_id">estado</label>
                                        <select class="form-control" name="estado" id="id_prov">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                            
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary submitBtn" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este empleado?');">
                                       </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- finModal -->

            </div>
            <!-- End of Main Content -->


            <?php include_once("componentes/footer.php");?>