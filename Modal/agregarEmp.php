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

//print_r($_POST);

    $query=("SELECT * FROM usuarios
    WHERE documento_usu='$documento'");

    $consulta=pg_query($conexion,$query);
    $cantidad=pg_num_rows($consulta);
    $consulta2 = pg_fetch_array($consulta);
    print_r($consulta2);
    if ($cantidad == 0)
    {
        $queryregistrar = "INSERT INTO usuarios(id_cargo,documento_usu,nombre1_usu,nombre2_usu,apellido1_usu,apellido2_usu,telefono_usu,clave_usu,estado_usu) VALUES('$idCargo','$documento','$nombre1','$nombre2','$apellido1','$apellido2','$telefono','$clave','$estado')";
        $consulta=pg_query($conexion,$queryregistrar);

        $query=("SELECT * FROM usuarios
        WHERE documento_usu='$documento'");

        $consulta=pg_query($conexion,$query);
        $cantidad=pg_num_rows($consulta);
        $consulta3 = pg_fetch_array($consulta);
        $documento=$consulta3['id_usuario'];
        $queryconsulta= "INSERT INTO acceso (id_usuario) VALUES('$documento')";
        $consulta4=pg_query($conexion,$queryconsulta);
        echo "<script> window.location= '../empleados2.php' </script>";

    }else{	
        $nombreCom = $consulta2['nombre1_usu'];
        echo "USUARIO REGISTRADO : ".$nombreCom;

    }

    $queryregistrar = "INSERT INTO usuarios(id_cargo,documento_usu,nombre1_usu,nombre2_usu,apellido1_usu,apellido2_usu,telefono_usu,clave_usu,estado_usu) VALUES('$idCargo','$documento','$nombre1','$nombre2','$apellido1','$apellido2','$telefono','$clave','$estado')";
    $consulta=pg_query($conexion,$query);
    
    if ($queryregistrar){
        //echo "e";
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