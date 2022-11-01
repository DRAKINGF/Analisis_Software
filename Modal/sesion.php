<?php

require '../conexion/conexion.php';

session_start();

$usuario=$_POST['user'];
$clave=$_POST['pass'];

$query=("SELECT * FROM usuarios INNER JOIN acceso ON acceso.id_usuario=usuarios.id_usuario WHERE usuarios.documento_usu='$usuario' AND clave_usu='$clave'");
//$query=("SELECT * FROM acceso WHERE usuario='$usuario' AND password='$clave'");

$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);
var_dump($consulta);
if($cantidad>0){
	$id_empleado = pg_fetch_array($consulta);
	$id_Acces = $id_empleado['id_acceso'];
	$_SESSION['nombre_usuario']=$id_empleado['id_acceso'];  
	$user1=$id_empleado['nombre1_usu'];
	$cargo=$id_empleado['id_cargo'];
	$_SESSION['user_name']=$user1;
	$_SESSION['user_cargo']=$cargo;
	var_dump($_SESSION['user_name']);
	header('Location:../main.php');  
}
else{
	echo "Datos incorrectos.";
}




?>