<?php

$host='localhost';
$bd='postgres';
$user='postgres';
$pass='123';

$conexion=pg_connect("host=$host dbname=$bd user=$user password=$pass");
if (!$conexion) {
    echo "Datos de acceso INCORRECTOS.\n";
    exit;
  }







?>