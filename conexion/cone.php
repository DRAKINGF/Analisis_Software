<?php 
require 'conexion.php';


class DBcontrol
{

	private $conexion;
	
function __construct() 
{ 
	$this->conexion = $this->conect();
}


function conect()
{
    $host='localhost';
    $bd='postgres';
    $user='postgres';
    $pass='123';
    
    $conexion=pg_connect("host=$host dbname=$bd user=$user password=$pass");
    
    return $conexion;
    
    
}

    
function vaiquery($query) 
{


    $resultado = pg_query($this->conexion,$query);
    while($fila=pg_fetch_assoc($resultado)) 
    {
        $obtener_resultado[] = $fila;
    }		
    if(!empty($obtener_resultado))
    {
    return $obtener_resultado;
    }
}

function nfilas($query) {
    $resultado  = pg_query($this->conexion,$query);
    $totalfilas = pg_num_rows($resultado);
    return $totalfilas;	
}

}



?>