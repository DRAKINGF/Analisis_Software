<?php
include_once("../conexion/conexion.php");
 
$cod = $_GET['cod'];

 
pg_query($conexion, " DELETE FROM producto WHERE codigo_pro= '$cod' ");
 
header("Location:../tables.php");


?>