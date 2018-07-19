<?php
require_once 'php/conexion.php';

session_start();

$nombre = $_SESSION['user'];
$query = "SELECT dni FROM alumno WHERE (usuario = '$nombre');";
$datos = mysqli_query($conexion, $query);

$dni = mysqli_fetch_array($datos)['dni'];
$id_aviso = $_POST['id_aviso'];

$query = "INSERT INTO postulaciones_por_alumno (dni, cod_aviso,estado) VALUES ('$dni', '$id_aviso','En Proceso');";
$dato = mysqli_query($conexion, $query);

echo var_dump($query);

if($dato)
    header('location: empleos.php');
else
    echo 'error';
?>

