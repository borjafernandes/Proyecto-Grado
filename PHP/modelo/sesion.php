<?php
    // Recuperamos la información de la sesión
    if(!isset($_SESSION)) 
    {
        session_start();
    }

    // Y comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['nombre'])) 
    {
        header("Location:vista/logearse.php");
        exit();
    }

    $nombre=$_SESSION['nombre'];
    $tipo_usuario=$_SESSION['id_tipousuario'];
?>