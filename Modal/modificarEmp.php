<?php 

include_once("../conexion/conexion.php");


$idCargo	= $_POST['id_cargo'];
$documento	= $_POST['txtdoc'];
$nombre1	= $_POST['nombre1'];
$nombre2	= $_POST['nombre2'];
$apellido1	= $_POST['apellido1'];
$apellido2	= $_POST['apellido2'];
$telefono	= $_POST['telefono'];
$clave     	= $_POST['pass'];
$estado	    = $_POST['estado'];
#print_r($_POST);
#$querymodificar = pg_query($conexion, "UPDATE usuarios SET nombre1_usu='$nombre1',nombre2_usu='$nombre2',apellido1_usu='$apellido1',apellido2_usu='$apellido2',telefono_usu='$telefono',clave_usu='$clave',estado_usu='$estado' WHERE documento_usu='$documento'");
$querymodificar = pg_query($conexion, "UPDATE usuarios 	SET   nombre1_usu='$nombre1', nombre2_usu='$nombre2', 
apellido1_usu='$apellido1', apellido2_usu='$apellido2', telefono_usu='$telefono', clave_usu='$clave ', estado_usu='$estado'
WHERE documento_usu='$documento'");

header("Location:../empleados2.php");



?>
