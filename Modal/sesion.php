<?php

require '../conexion/conexion.php';

session_start();

$usuario=$_POST['user'];
$clave=$_POST['pass'];

$query=("SELECT * FROM acceso
	WHERE email='$usuario' AND contrasena='$clave'");

$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);

if($cantidad>0){

	$_SESSION['nombre_usuario']=$usuario;
	header('Location:../main.php');
}
else{
	echo "Datos incorrectos.";
}




?>