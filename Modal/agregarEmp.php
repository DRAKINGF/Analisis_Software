<?php 
include_once("../conexion/conexion.php"); 


    $idCargo	= $_POST['id_cargo'];
    $documento	= $_POST['txtdoc'];
    $nombre1	= $_POST['nombre1'];
    $nombre2	= $_POST['nombre2'];
    $apellido1	= $_POST['apellido1'];
    $apellido2	= $_POST['apellido2'];
    $telefono	= $_POST['telefono'];
    $clave     	= $_POST['pass'];
    $estado	    = $_POST['estado'];
    
    $nombreCom=$nombre1." ".$apellido1;

    $query=("SELECT * FROM usuarios
    WHERE documento_usu='$documento'");


    $consulta=pg_query($conexion,$query);
    $cantidad=pg_num_rows($consulta);
    $queryregistrar = "INSERT INTO usuarios(id_cargo,documento_usu,nombre1_usu,nombre2_usu,apellido1_usu,apellido2_usu,telefono_usu,clave_usu,estado_usu) VALUES($idCargo','$documento','$nombre1','$nombre2','$apellido1','$apellido2','$telefono','$clave','$estado')";
    if ($queryregistrar){
        echo "e";
    }
/*
    if ($cantidad == 0)
{
	$queryregistrar = "INSERT INTO usuarios(id_cargo,documento_usu,nombre1_usu,nombre2_usu,apellido1_usu,apellido2_usu,telefono_usu,clave_usu,estado_usu) VALUES('$id_cargo','$documento','$nombre1','$nombre2','$apellido1','$apellido2','$relefono','$clave','$estado')";
	

if(pg_query($conexion,$queryregistrar))
{
	echo "<script> alert('Usuario registrado: $nombreCom');window.location= '../empleados2.php' </script>";
}
else 
{
	echo "Error: " .$queryregistrar."<br>".pg_last_error($conexion);
}

}
else
{
		echo "<script> alert('No puedes registrar este usuario: $nombreCom');window.location= '../empleados2.php' </script>";
}
header("Location:../empleados2.php");
	
*/
?>