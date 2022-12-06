<?php 

include_once("../conexion/conexion.php");


$cod	= $_POST['txtcodigo'];
$nombre 	= $_POST['txtnombre'];
$stok = $_POST['txtstock'];
$precio	= $_POST['txtprecio'];
$desc 	= $_POST['txtdescripcion'];

$querymodificar = pg_query($conexion, "UPDATE productos SET nombre_prod='$nombre',precio_prod='$precio',descripcion_prod='$desc' ,cantidad_prod ='$stok' WHERE codigo_prod='$cod'");
header("Location:../tables2.php");

?>
