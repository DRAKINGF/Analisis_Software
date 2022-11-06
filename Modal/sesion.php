<?php

require '../conexion/conexion.php';

session_start();

$usuario=$_POST['user'];
$clave=$_POST['pass'];

//$query=("SELECT * FROM usuarios INNER JOIN acceso ON acceso.id_usuario=usuarios.id_usuario WHERE usuarios.documento_usu='$usuario' AND usuarios.clave_usu='$clave'");
//$query=("SELECT * FROM acceso WHERE usuario='$usuario' AND password='$clave'");
$query=("SELECT * FROM usuarios WHERE documento_usu='$usuario' AND clave_usu='$clave'  and estado_usu='SI' and id_cargo='2' ");
$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);
var_dump($consulta);
$query2=("SELECT * FROM usuarios WHERE documento_usu='$usuario' AND clave_usu='$clave'  and estado_usu='SI' and id_cargo='1' ");
$consulta2=pg_query($conexion,$query2);
$cantidad2=pg_num_rows($consulta2);
/*
$consulta2 = pg_fetch_array($consulta);
print_r($consulta2);
*/
if($cantidad>0){
	$id_empleado = pg_fetch_array($consulta);
	$id_Acces = $id_empleado['id_acceso'];
	$_SESSION['nombre_usuario']=$id_empleado['id_usuario'];  
	$user1=$id_empleado['nombre1_usu'];
	$cargo=$id_empleado['id_cargo'];
	$_SESSION['user_name']=$user1;
	$_SESSION['user_cargo']=$cargo;
	var_dump($_SESSION['user_name']);
	header('Location:../tables2.php');  
}
else{
	echo "Datos incorrectos.";
}
if($cantidad2>0){
	$id_empleado = pg_fetch_array($consulta2);
	$id_Acces = $id_empleado['id_acceso'];
	$_SESSION['nombre_usuario']=$id_empleado['id_usuario'];  
	$user1=$id_empleado['nombre1_usu'];
	$cargo=$id_empleado['id_cargo'];
	$_SESSION['user_name']=$user1;
	$_SESSION['user_cargo']=$cargo;
	var_dump($_SESSION['user_name']);
	header('Location:../empleados2.php');  
}
else{
	echo "Datos incorrectos.";
}




?>