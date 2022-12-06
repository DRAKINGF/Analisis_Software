<?php 
include_once("../conexion/conexion.php"); 


    $cod	= $_POST['txtcodigo'];
    $nombre 	= $_POST['txtnombre'];
    $precio	= $_POST['txtprecio'];
    $desc 	= $_POST['txtdesc'];
    
    $query=("SELECT * FROM producto
    WHERE cod_producto='$cod'");

$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);
    

    if ($cantidad == 0)
{
	$queryregistrar = "INSERT INTO producto(cod_producto,nombre,precio,descripcion) VALUES('$cod','$nombre','$precio','$desc')";
	

if(pg_query($conexion,$queryregistrar))
{
	echo "<script> alert('Usuario registrado: $usuario');window.location= '../tables.php' </script>";
}
else 
{
	echo "Error: " .$queryregistrar."<br>".pg_last_error($conexion);
}

}
else
{
		echo "<script> alert('No puedes registrar este usuario: $usuario');window.location= '../tables2.php' </script>";
}
header("Location:../tables2.php");
	

?>