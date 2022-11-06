<?php 
include_once("../conexion/conexion.php"); 

session_start();

$usuario = $_SESSION['nombre_usuario'];

    $cod	= $_POST['txtdocR'];
    $nombre 	= $_POST['nombre1R'];
    $nombre2 	= $_POST['nombre2R'];
    $precio	= $_POST['txtprecio'];
    $stock 	= $_POST['txtstock'];
    $descripcion 	= $_POST['txtdescripcion'];
    //$admin = $_POST['id_admin'];
    $proveedor = $_POST['id_prov'];
    
    $query=("SELECT * FROM productos
    WHERE codigo_prod='$cod'");

    $consulta=pg_query($conexion,$query);
    $cantidad=pg_num_rows($consulta);

//print_r($_POST);

    $query=("SELECT * FROM usuarios
    WHERE documento_usu='$documento'");

    $consulta=pg_query($conexion,$query);
    $cantidad=pg_num_rows($consulta);
    $consulta2 = pg_fetch_array($consulta);
    //print_r($consulta2);
    if ($cantidad == 0)
    {
        $queryregistrar = "INSERT INTO usuarios(id_cargo,documento_usu,nombre1_usu,nombre2_usu,apellido1_usu,apellido2_usu,telefono_usu,clave_usu,estado_usu) VALUES('$idCargo','$documento','$nombre1','$nombre2','$apellido1','$apellido2','$telefono','$clave','$estado')";
        $consulta=pg_query($conexion,$queryregistrar);

      /*  $queryconsulta= "SELECT id_usuario FROM usuarios where documento_usu='$documento' ORDER BY id_usuario DESC LIMIT 1";
        $consulta3=pg_query($conexion,$queryconsulta);*/
       echo "<script> window.location= '../empleados2.php' </script>";

    }else{	
        $nombreCom = $consulta2['nombre1_usu'];
        echo "USUARIO REGISTRADO : ".$nombreCom;

    }

    $queryregistrar = "INSERT INTO usuarios(id_cargo,documento_usu,nombre1_usu,nombre2_usu,apellido1_usu,apellido2_usu,telefono_usu,clave_usu,estado_usu) VALUES($idCargo','$documento','$nombre1','$nombre2','$apellido1','$apellido2','$telefono','$clave','$estado')";
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