<?php
    session_start();

    $total = 0;
    $costo = 0;
    if(isset($_REQUEST['costo'])){
        $costo = $_REQUEST['costo'];
    }

    if(isset($_SESSION['carrito'])&&count($_SESSION['carrito'])!=0){
        foreach($_SESSION['carrito'] as $carrito){
            $total = $total + $carrito['precioSinIva']*$carrito['cantidad'];
        }
    }

    echo '$'.number_format(($total+$costo), 2,'.','');

?>