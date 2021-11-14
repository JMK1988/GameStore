<?php
    session_start();

    $cantidad = 0; 
    if(isset($_SESSION['carrito'])&&count($_SESSION['carrito'])!=0){
        foreach($_SESSION['carrito'] as $carrito){

            $cantidad = $cantidad + $carrito['cantidad'];
        }
        
    }
    echo $cantidad;
    

   



?>