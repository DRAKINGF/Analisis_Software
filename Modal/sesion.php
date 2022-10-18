<?php

require '../conexion/conexion.php';

session_start();

$usuario=$_POST['user'];
$clave=$_POST['pass'];

$query=("SELECT * FROM acceso
	WHERE email='$usuario' AND clave='$clave'");
	
$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);

if(true){

	$_SESSION['nombre_usuario']=$usuario;

	$query1=("SELECT * FROM acceso
	WHERE acce_email='$usuario' AND acce_contrasena='$clave'");
	header('Location:../main.php');
}
else{
	echo "Datos incorrectos.";
}




?>