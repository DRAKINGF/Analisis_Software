<?php 
include_once("../conexion/conexion.php"); 
include_once("../tcpdf/pdf/factura1.php"); 


    $cod	= $_POST['txtcodigo'];
    $nombre 	= $_POST['txtnombre'];
    $precio	= $_POST['txtprecio'];
    $stock 	= $_POST['txtstock'];
    $admin = $_POST['id_admin'];
    $proveedor = $_POST['id_prov'];
    
    $query=("SELECT * FROM producto
    WHERE codigo_pro='$cod'");

$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);
    

    if ($cantidad == 0)
{
	$queryregistrar = "INSERT INTO producto(id_administrador,id_proveedor,codigo_pro,nombre_pro,stock_pro,preciounit_pro) VALUES('$admin','$proveedor','$cod','$nombre','$stock','$precio')";
	

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
		echo "<script> alert('No puedes registrar este usuario: $usuario');window.location= '../tables.php' </script>";
}
header("Location:../tables.php");
	

?>