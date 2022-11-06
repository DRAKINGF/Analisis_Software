<?php
include_once("../conexion/conexion.php");
 
$cod = $_GET['cod'];

 
pg_query($conexion, "DELETE FROM registrar_productos  WHERE id_producto= '$cod'");
 
header("Location:../tables2.php");


?>