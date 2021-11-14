<?php
    session_start();
    $idProductos = $_REQUEST['idProductos'];
    require_once('productos.php');
    $objP = new Productos();
    $respP = $objP->obtenerProducto($idProductos);
    $agrega=0; //Variable bandera...
    //RECORRER EL ARREGLO DE SESSION
    if(isset($_SESSION['carrito'])){
    //inicializamos la variable.
    //si la variable $i es menor que la longitud del carrito
    //incremente 1 al valor de $i.
        for($i=0; $i<count($_SESSION['carrito']); $i++){
        //Verificar si el producto ya existe en el carrito...
            if($_SESSION['carrito'][$i]['idProductos']==$idProductos){
                //Si ya existe, aumentamos la cantidad en 1
                $_SESSION['carrito'][$i]['cantidad'] = $_SESSION['carrito'][$i]['cantidad']+1;
                 //Incrementamos la cantidad en 1.
                $agrega=1;
            }
        }
    }
    //Si no existe el producto en el carrito, lo agregamos.
    if($agrega==0){
        $respP[0]['cantidad'] = 1;
        array_push($_SESSION['carrito'], $respP[0]);
    }
    ?>
<div class="alert alert-success" id="success-alert">
     <button type="button" class="close" data-dismiss="alert">x</button>
     Producto cargado exitosamente!
</div>
<script>
        $(document).ready(function() {
            $("#success-alert").fadeTo(2000, 500).slideUp(500,
                function(){
                $("#success-alert").slideUp(500);}
            );
    });
</script>