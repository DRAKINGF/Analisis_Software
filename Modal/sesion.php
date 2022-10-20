<?php

require '../conexion/conexion.php';

session_start();

$usuario=$_POST['user'];
$clave=$_POST['pass'];

$query=("SELECT id_empleado FROM acceso INNER JOIN empleado ON acceso.id_acceso=empleado.id_acceso WHERE usuario='$usuario' AND password='$clave'");

$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);
var_dump($consulta);
if($cantidad>0){
	$id_empleado = pg_fetch_array($consulta);
	$_SESSION['nombre_usuario']=$id_empleado['id_empleado'];
	header('Location:../main.php');
}
else{
	echo "Datos incorrectos.";
}




?>