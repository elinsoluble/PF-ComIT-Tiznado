<?php
require('php/conexion.php');

if(isset($_POST['username']) and isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM alumno WHERE (usuario='$username') AND (password='$password');";
 
    $result = mysqli_query($conexion, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1)
    {
        //echo 'OK';
        session_start();

        $_SESSION['user'] = $username;

        header('location:empleos.php');
    }
    else
    {        
        header('location:index.php');
    }
}
?>