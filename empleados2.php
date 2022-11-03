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
                                          $queryempleado = pg_query($conexion, "SELECT * FROM usuarios where id_cargo='2' ");
                                        

                                        $numerofila = 0;
                                        $i=1;
                                        while($mostrar = pg_fetch_array($queryempleado)) 
                                        {    $numerofila++;

                                            echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".$mostrar['documento_usu']."</td>";    
                                            echo "<td>".$mostrar['nombre1_usu']."</td>";  
                                            echo "<td>".$mostrar['telefono_usu']."</td>";
                                            echo "<td>".$mostrar['estado_usu']."</td>";
                         

                                            $i++;
                                            ?>
                                            <td>
                                            <a   class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#formActulizar" onClick="")>
                                            <i class="fas fa-edit"></i>
 
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
                                            <option value="activo">activo</option>
                                            <option value="inactivo">inactivo</option>
                                            
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
                                        <label for="inputCod">Codigo Producto</label>
                                        <input type="text" class="form-control"  name="txtcodigo" placeholder="Ingresa codigo producto" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Nombre Producto</label>
                                        <input type="text" class="form-control"   name="txtnombre" placeholder="Ingrese nombre" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPre">Precio Producto</label>
                                        <input type="number" class="form-control"  name="txtprecio" placeholder="Ingrese Precio" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">Stock Producto</label>
                                        <input type="text" class="form-control"  name="txtstock" placeholder="Ingrese stock Producto" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">Descripcion Producto</label>
                                        <input type="text" class="form-control"  name="txtdescripcion" placeholder="Ingrese descripcion Producto" required=""/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="asig_id">estado</label>
                                        <select class="form-control" name="id_prov" >
                                            <option value="">activo</option>
                                            <option value="">inactivo</option>
                                            
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