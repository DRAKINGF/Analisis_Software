<?php
include_once("../conexion/conexion.php");
 
$cod = $_GET['cod'];

 
pg_query($conexion, " DELETE FROM producto WHERE cod_producto= '$cod' ");
 
header("Location:../tables.php");


?>