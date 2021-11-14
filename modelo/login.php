<?php
    session_start();
    require_once('conexion.php');
     
    $usuario = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];


    $baseDatos = new Conexion();
    $db = $baseDatos->obtenerConexion();

    
   
    ?>

