<?php 
include_once("../conexion/conexion.php"); 

session_start();

$usuario = $_SESSION['nombre_usuario'];

    $cod	= $_POST['txtcodigo'];
    $nombre 	= $_POST['txtnombre'];
    $precio	= $_POST['txtprecio'];
    $stock 	= $_POST['txtstock'];
    $descripcion 	= $_POST['txtdescripcion'];
    //$admin = $_POST['id_admin'];
    $proveedor = $_POST['id_prov'];
    
    $query=("SELECT * FROM productos
    WHERE codigo_prod='$cod'");

    $consulta=pg_query($conexion,$query);
    $cantidad=pg_num_rows($consulta);
    

    if ($cantidad == 0)
{
	$queryregistrar = "INSERT INTO productos(codigo_prod,nombre_prod,precio_prod,cantidad_prod,descripcion_prod) VALUES('$cod','$nombre','$precio','$stock','$descripcion')";
	$consulta11=pg_query($conexion,$queryregistrar);

    $query2= "SELECT * 
    FROM productos  
    where codigo_prod='$cod'
    ORDER BY id_producto DESC 
    LIMIT 1";

    $query3= "SELECT *  
    FROM proveedores  
    where id_proveedor='$proveedor'
    ORDER BY id_proveedor DESC 
    LIMIT 1";

    $consulta1=pg_query($conexion,$query2);
    $consulta2=pg_query($conexion,$query3);
    if($consulta11)
    {
        $today = date("Y/m/j");
        $nombre_prov = pg_fetch_array($consulta2);
        echo "prueba";
        $id_producto = pg_fetch_array($consulta1);
        print_r($nombre_prov);
        echo "prueba2";
        print_r($usuario);
        echo "prueba3";
        print_r($id_producto);
        $id_prodcuto2= $id_producto['0'];
        $nombre_prov2= $id_producto['0'];
        $id_proveedor = $nombre_prov['nombre_prov'];
        print_r($id_prodcuto2);
        echo "<script> alert('proveedor registrado:'".$nombre_prov['nombre_prov'].");</script>";
        $queryregistrar = "INSERT INTO registrar_productos(id_proveedor,id_usuario,id_producto,nombre_prov,cantidad_prov,fecha) VALUES('$proveedor','$usuario','$id_prodcuto2','$nombre_prov2','$stock','$today')";
	
    }

if(pg_query($conexion,$queryregistrar))
{
    
	echo "<script> alert('Usuario registrado');</script>";
}
else 
{
	echo "Error: " .$queryregistrar."<br>".pg_last_error($conexion);
}

}
else
{
		echo "<script> alert('No puedes registrar este usuario: $usuario'); </script>";
}
header("Location:../tables2.php");
	

?>