<?php

$usuario = "root";
$contraseña = "claudio416";
$host = "localhost";
$db = "proyecto";

$conexion = mysqli_connect($host, $usuario, $contraseña, $db) or die("No se ha podido conectar al servidor de Base de datos");

?>