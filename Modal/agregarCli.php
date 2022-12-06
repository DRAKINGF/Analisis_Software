<?php 
include_once("../conexion/conexion.php"); 


    $id_doc	= $_POST['id_doc'];
    $nombre1	= $_POST['nombre1'];
    $nombre2	= $_POST['nombre2'];
    $apellido1	= $_POST['apellido1'];
    $apellido2	= $_POST['apellido2'];
    $telefono	= $_POST['telefono'];
    $direccion  = $_POST['direccion'];
    
    $nombreCom=$nombre1." ".$apellido1;

//print_r($_POST);

    $query=("SELECT * FROM clientes
    WHERE documento_cli='$id_doc' ");

    $consulta=pg_query($conexion,$query);
    $cantidad=pg_num_rows($consulta);
    $consulta2 = pg_fetch_array($consulta);
    print_r($consulta2);
    if ($cantidad == 0)
    {
        $queryregistrar = "INSERT INTO clientes(documento_cli,nombre1_cli,nombre2_cli,apellido1_cli,apellido2_cli,telefono_cli,direccion_cli) VALUES('$id_doc','$nombre1','$nombre2','$apellido1','$apellido2','$telefono','$direccion')";
        $consulta=pg_query($conexion,$queryregistrar);

        echo "<script> window.location= '../clientes.php' </script>";

    }else{	
        $nombreCom = $consulta2['nombre1_cli'];
        echo "USUARIO REGISTRADO : ".$nombreCom;

    }

    $queryregistrar = "INSERT INTO clientes(documento_cli,nombre1_cli,nombre2_cli,apellido1_cli,apellido2_cli,telefono_cli,direccion_cli) VALUES('$id_doc','$nombre1','$nombre2','$apellido1','$apellido2','$telefono','$direccion')";
    $consulta=pg_query($conexion,$queryregistrar);
    
    if ($queryregistrar){
        //echo "e";
    }
/*
    if ($cantidad == 0)
{
	$queryregistrar = "INSERT INTO usuarios(id_cargo,documento_cli,nombre1_cli,nombre2_cli,apellido1_cli,apellido2_cli,telefono_cli,direccion_cli) VALUES('$id_cargo','$documento','$nombre1','$nombre2','$apellido1','$apellido2','$relefono','$clave','$estado')";
	

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