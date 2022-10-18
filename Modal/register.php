<?php
//Para registrar
include('../conexion/conexion.php');

$usuario	= $_POST["user"];
$clave	= $_POST["pass"];

$query=("SELECT * FROM acceso
	WHERE email='$usuario'");

$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);

if ($cantidad == 0)
{
	$queryregistrar = "INSERT INTO acceso(email,contrasena) values ('$usuario','$clave')";
	

if(pg_query($conexion,$queryregistrar))
{
	echo "<script> alert('Usuario registrado: $usuario');window.location= '../index.php' </script>";
}
else 
{
	echo "Error: " .$queryregistrar."<br>".pg_last_error($conexion);
}

}
else
{
		echo "<script> alert('No puedes registrar este usuario: $usuario');window.location= 'index.html' </script>";
}
/*VaidrollTeam*/
?>