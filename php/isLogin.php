<?php
    session_start();

    $user = $_SESSION['user'];
    $estado = false;

    if(isset($user))
    {
        $estado = true;
    }
?>