<?php

require '../conexion/conexion.php';

session_start();

$usuario=$_POST['user'];
$clave=$_POST['pass'];

$query=("SELECT * FROM acceso
	WHERE usuario='$usuario' AND password='$clave'");

$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);
var_dump($consulta);
if($cantidad>0){
	$id_empleado = pg_fetch_array($consulta);
	$id_Acces = $id_empleado['id_acceso'];
	$_SESSION['nombre_usuario']=$id_empleado['id_acceso'];
	$query=("SELECT * FROM empleado WHERE id_acceso='$id_Acces'");
	$consulta=pg_query($conexion,$query);
	$cantidad=pg_num_rows($consulta);
	while($nombre = pg_fetch_array($consulta)) 
    {   
		$user1=$nombre['nombre1_emp'];
		$_SESSION['user_name']=$user1;
		header('Location:../main.php');  
	}
    
}
else{
	echo "Datos incorrectos.";
}




?>