
<?php
session_start();

include('conexion/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Empleados</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
   

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
   
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-successN sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="main.php">
             <div >
                <img   class="img-side" src="img/logo.png">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="main.php">
                <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reporte</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Empleado</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administrar:</h6>
                        <a class="collapse-item" href="buttons.html">Agregar Emplados</a>
                        <a class="collapse-item" href="cards.html">Consultar Empleados</a>
                        <a class="collapse-item" href="cards.html">Actualizar Empleados</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
 
            <!-- Nav Item - Pages Collapse Menu -->
            <!--
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="index.php">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
             -->
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                <i class="fa fa-calculator" aria-hidden="true"></i>
                    <span>Facturacion</span></a>
                    
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                <i class="fa fa-cubes" aria-hidden="true"></i>
                    <span>Inventario</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form method="POST"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text"  class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button   class="btn btn-success" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Buscar..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <?php //$queryproducto = pg_query($conexion, "SELECT * FROM producto ORDER BY nombre_pro asc"); ?>-->
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php $user=$_SESSION['nombre_usuario']; echo "Bienvenido $user"; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!--
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                  -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-center">
                            <h6 class="m-0 font-weight-bold text-success">Lista de productos</h6>
                            </div>
                            <div class="float-sm-right">
                            <button class="btn btn-success submitBtn"  data-toggle="modal" data-target="#modalForm">Añadir producto</button>
                            </div>
                          <!--  <a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a>-->
                        </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                 <!-- Topbar Search -->
                                    <form method="POST"
                                        class="offset-md-8 navbar-search">
                                        <div class="input-group">
                                            <input type="text"  class="form-control bg-light border-0 small" placeholder="Buscar Clientes"
                                                aria-label="Search" aria-describedby="basic-addon2" id="txtbuscar" name="txtbuscar">
                                            <div class="input-group-append">
                                                <button   class="btn btn-success" type="submit" id="btnbuscar" name="btnbuscar">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                <table class="display" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre1</th>
                                            <th>Nombre2</th>
                                            <th>Apellido1</th>
                                            <th>Apellido2</th>
                                            <th>Cargo</th>
                                            <th>Telefono</th>
                                            <th>Acción</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                        <?php
                                          $queryproducto = pg_query($conexion, "SELECT * FROM producto ORDER BY nombre_pro asc");
                                          $queryproveedor = pg_query($conexion, "SELECT * FROM proveedor");
                                          $queryadministrador = pg_query($conexion, "SELECT * FROM empleado");
                                        
                                        if(isset($_POST['btnbuscar']))
                                           {
                                            $buscar = $_POST['txtbuscar'];
                                             $queryproveedor = pg_query($conexion, "SELECT * FROM producto where nombre_pro like '$buscar' or codigo_pro like '$buscar'");
                                             if(pg_fetch_array($queryproveedor)){
                                                $queryproveedor = pg_query($conexion, "SELECT * FROM producto where nombre_pro like '$buscar' or codigo_pro like '$buscar'");
                                            }else{
                                               //echo "<script> alert('No Se encontro el producto consultado');window.location= 'tables.php' </script>";
                                            }
                                             
                                             }
                                             else
                                            {
                                             $queryproveedor = pg_query($conexion, "SELECT * FROM producto ORDER BY nombre_pro asc");
                                             }
                                        $numerofila = 0;
                                        while($mostrar = pg_fetch_array($queryproveedor)) 
                                        {    $numerofila++;
                                            //print_r($mostrar);
                                            $is1="".$mostrar['id_proveedor'];
                                            $nameproveedor = pg_query($conexion, "SELECT nombre_prov FROM proveedor WHERE id_proveedor='".$is1."'");
                                            $nameproveedor1 = pg_fetch_array($nameproveedor);
                                            $is2="".$mostrar['id_administrador'];
                                            $nameadministrador = pg_query($conexion, "SELECT nombre1_ad FROM administrador WHERE id_administrador='".$is2."'");
                                            $nameadministrador1 = pg_fetch_array($nameadministrador);
                                            echo "<tr>";
                                            echo "<td>".$mostrar['id_producto']."</td>";
                                            echo "<td>".$mostrar['codigo_pro']."</td>";    
                                            echo "<td>".$mostrar['nombre_pro']."</td>";  
                                            echo "<td>".$mostrar['stock_pro']."</td>";
                                            echo "<td>".$mostrar['preciounit_pro']."</td>";
                                            echo "<td>".$nameproveedor1['nombre_prov']."</td>";
                                            echo "<td>".$nameadministrador1['nombre1_ad']."</td>";
                                            ?>
                                            <td>
                                            <a   class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#formModal2" onClick="guardar('<?php echo $mostrar['id_producto']?>','<?php echo $mostrar['codigo_pro']?>','<?php echo $mostrar['nombre_pro']?>','<?php echo $mostrar['stock_pro']?>','<?php echo $mostrar['preciounit_pro']?>','<?php echo $mostrar['id_administrador']?>','<?php echo $mostrar['id_proveedor']?>')")>
                                            <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-circle btn-sm" href="modal/eliminar.php?cod=<?php echo $mostrar['codigo_pro'] ?>" onClick="return confirm('¿Estás seguro de eliminar a <?php echo $mostrar['nombre_pro']?>?')">
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
                    </div>

            <!-- Modal -->
            <div class="modal fade" id="modalForm" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <!--
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                                        -->
                            <h4 class="modal-title" id="myModalLabel">Agregar</h4>
                        </div>
                        
                                        <!-- Modal Body -->
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
                                                <div class="row">
                                              
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="estu_id">Administrador</label>
                                                                <select class="form-control" name="id_admin" id="id_admin">
                                                                    <option value="">Selecionar administrador</option>
                                                                    <?php
                                                                        $numerofila = 0;
                                                                        while($mostrar = pg_fetch_array($queryproveedor)) 
                                                                        {    
                                                                            $numerofila++;
                                                                            echo "<option value=".$mostrar['id_proveedor'].">".ucwords(strtolower($mostrar['nombre_prov']))."</option>";
                                                                        }   
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="asig_id">Proveedor</label>
                                                                <select class="form-control" name="id_prov" id="id_prov">
                                                                    <option value="">Selecionar proveedor</option>
                                                                    <?php
                                                                        $numerofila = 0;
                                                                        while($mostrar2 = pg_fetch_array($queryadministrador)) 
                                                                        {    
                                                                            $numerofila++;
                                                                            echo "<option value=".$mostrar2['id_administrador'].">".ucwords(strtolower($mostrar2['nombre1_ad']))."</option>";
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
                                        
                                        <!-- Modal Footer -->

                                    </div>
                                </div>
                            </div>
                    </div>




                 <!-- Modal2 -->
                    <div class="modal fade" id="formModal2" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <!--
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                                        -->
                            <h4 class="modal-title" id="myModalLabel">Modificar</h4>
                        </div>
                                    <?php
                                                
                                        
                                                    $queryproveedor = pg_query($conexion, "SELECT * FROM proveedor");
                                                    $queryadministrador = pg_query($conexion, "SELECT * FROM administrador");

                                                     ?>
                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <p class="statusMsg"></p>
                                            <form name="formulario" method="POST" role="form" action="Modal/modificar.php">
                                               
                                            <div class="form-group">
                                                    <label for="inputCod">Codigo Producto</label>
                                                    <input type="text" class="form-control" id="inputCode1" name="txtcodigo" placeholder="Ingresa codigo producto" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNom">Nombre Producto</label>
                                                    <input type="text" class="form-control" id="inputName1"  name="txtnombre" placeholder="Ingrese nombre" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPre">Precio Producto</label>
                                                    <input type="number" class="form-control" id="inputPrice1" name="txtprecio" placeholder="Ingrese Precio" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMessage">Stock Producto</label>
                                                    <input type="text" class="form-control" id="inputStock1"  name="txtstock" placeholder="Ingrese stock Producto" required=""/>
                                                </div>
                                                <div class="row">
                                                
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="estu_id">Administrador</label>
                                                                <select class="form-control" name="id_admin1" id="id_admin1">
                                                                    <option value="">Selecionar administrador</option>
                                                                    <?php
                                                                        $numerofila = 0;
                                                                        while($mostrar = pg_fetch_array($queryproveedor)) 
                                                                        {    
                                                                            $numerofila++;
                                                                            echo "<option value=".$mostrar['id_proveedor'].">".ucwords(strtolower($mostrar['nombre_prov']))."</option>";
                                                                        }   
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="asig_id">Proveedor</label>
                                                                <select class="form-control" name="id_prov1" id="id_prov1">
                                                                    <option value="">Selecionar proveedor</option>
                                                                    <?php
                                                                        $numerofila = 0;
                                                                        while($mostrar = pg_fetch_array($queryadministrador)) 
                                                                        {    
                                                                            $numerofila++;
                                                                            echo "<option value=".$mostrar['id_administrador'].">".ucwords(strtolower($mostrar['nombre1_ad']))."</option>";
                                                                        }   
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <input type="submit" class="btn btn-primary submitBtn"  value="Modificar" onClick="guardar()">
                                    
                                        </div>
                                            </form>
                                        </div>
                                        
                                        <!-- Modal Footer -->

                                    </div>
                                </div>
                            </div>
                    </div>



  </script>
 

       </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>