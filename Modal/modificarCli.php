<?php 

include_once("../conexion/conexion.php");


$id_doc	= $_POST['id_doc'];
$nombre1	= $_POST['nombre1'];
$nombre2	= $_POST['nombre2'];
$apellido1	= $_POST['apellido1'];
$apellido2	= $_POST['apellido2'];
$telefono	= $_POST['telefono'];
$direccion  = $_POST['direccion'];
#print_r($_POST);
#$querymodificar = pg_query($conexion, "UPDATE cliarios SET nombre1_cli='$nombre1',nombre2_cli='$nombre2',apellido1_cli='$apellido1',apellido2_cli='$apellido2',telefono_cli='$telefono',clave_cli='$clave',estado_cli='$estado' WHERE documento_cli='$documento'");
$querymodificar = pg_query($conexion, "UPDATE clientes 	SET   nombre1_cli='$nombre1', nombre2_cli='$nombre2', 
apellido1_cli='$apellido1', apellido2_cli='$apellido2', telefono_cli='$telefono', direccion_cli='$direccion '
WHERE documento_cli='$id_doc'");

header("Location:../clientes.php");

?>
