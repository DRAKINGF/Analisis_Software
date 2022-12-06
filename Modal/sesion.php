<?php

require '../conexion/conexion.php';

session_start();

$usuario=$_POST['user'];
$clave=$_POST['pass'];

$query=("SELECT * FROM usuarios INNER JOIN acceso ON usuarios.id_usuario=acceso.id_usuario 
		WHERE usuarios.documento_usu='$usuario' AND usuarios.clave_usu='$clave' 
		and estado_usu='SI'");

$consulta=pg_query($conexion,$query);
$id = pg_fetch_array($consulta);
$cantidad=pg_num_rows($consulta);
//var_dump($id);

if($cantidad>0){
	$id_empleado = $id;
	$id_Acces = $id_empleado['id_acceso'];
	$_SESSION['nombre_usuario']=$id_empleado['id_usuario'];  
	$user1=$id_empleado['nombre1_usu'];
	$cargo=$id_empleado['id_cargo'];
	$_SESSION['user_name']=$user1;
	$_SESSION['user_cargo']=$cargo;
	// Hacer modificacion en la tabla de "cargos" o VALIDAR que el id_cargo = 1 corresponda al ADMINISTRADOR
	// Y el id_cargo=2 corresponda al EMPLEADO
	if($cargo=="2"){
		//var_dump($_SESSION['user_name']);
		header('Location:../tables2.php'); 
	}else{
		//var_dump($_SESSION['user_name']);
		header('Location:../empleados2.php');  
	} 
}

else{
	$_SESSION['no_session']="";
	header('Location:../index.php');
}

?>