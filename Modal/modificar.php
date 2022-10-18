<?php 

include_once("../conexion/conexion.php");


$cod	= $_POST['txtcodigo'];
$nombre 	= $_POST['txtnombre'];
$precio	= $_POST['txtprecio'];
$desc 	= $_POST['txtdesc'];

$querymodificar = pg_query($conexion, "UPDATE producto SET nombre='$nombre',precio='$precio',descripcion='$desc' WHERE cod_producto='$cod'");
header("Location:../tables.php");



?>
