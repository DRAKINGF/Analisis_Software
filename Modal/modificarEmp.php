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

$querymodificar = pg_query($conexion, "UPDATE producto SET nombre='$nombre',precio='$precio',descripcion='$desc' WHERE cod_producto='$cod'");
header("Location:../tables.php");



?>
