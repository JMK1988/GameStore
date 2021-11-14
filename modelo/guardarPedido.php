<?php
    date_default_timezone_get('America/Argentina/Buenos_Aires');//seleccionar horario de servidor//

    session_start();//inicio de session//

    require_once('conexion.php');//importar conexion//

    $fecha = date("y-m-d");
    $hora = date("h:i");
    $apellidoNombre = $_REQUEST['apellidoNombre'];
    $tipoDoc = $_REQUEST['tipoDoc'];
    $documento = $_REQUEST['documento'];
    $localidad = $_REQUEST['localidad'];
    $codPostal = $_REQUEST['codPostal'];
    $domicilio = $_REQUEST['domicilio'];
    $telefono = $_REQUEST['telefono'];
    $email = $_REQUEST['email'];
    $envio = $_REQUEST['envio'];

    //generamos la conexion a la BD//

    $baseDatos = new Conexion();
    $db = $baseDatos->obtenerConexion();
    
    //insertar datos en tabla pedidos
    $query = " INSERT INTO pedidos
                (fecha, hora, apellidoNombre, tipoDoc, documento, localidad, codPostal, domicilio, telefono, email, envio)
                values ('$fecha','$hora','$apellidoNombre','$tipoDoc', $documento,'$localidad',  $codPostal,'$domicilio', $telefono,'$email','$envio')
                ";
    
    $stmt = $db->prepare($query);
    $stmt->execute();
                //verificamos si la insercion se realizo
                if($stmt->rowCount()>0){
                   
                 //si pasa por aca se realizo la insercion correctamente
                 $idPedido = $db->lastInsertId();//nos devuelve el ultimo registro primario que se inserto



                }else{
                    exit(0);
                }

    //recorrer el arreglo carrito
                $agrega = 0;//variable bandera
                foreach($_SESSION['carrito'] as $carrito){
                    $idProducto   = $carrito['idProductos'];
                    $detalle      = $carrito['detalle'];
                    $cantidad     = $carrito['cantidad'];
                    $precioSinIva = $carrito['precioSinIva'];

                    //insertar cada posicion en la tabla pedidos_detalle
                    $query = "INSERT INTO pedidodetalle
                            (idPedido, idProducto, detalle, cantidad, precioSinIva)
                            values ($idPedido, $idProducto, '$detalle', $cantidad, $precioSinIva)
                            ";

                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    //verificamos si la insercion se realizo
                    if($stmt->rowCount()>0){

                        $agrega++;//incrementamos $agrega en 1

                    }

                        


                }
               
                if(count($_SESSION['carrito'])==$agrega){
                    session_destroy(); //Blanquear las sessiones...
            ?>  
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'PEDIDO REALIZADO CON EXITO.',
                            text: 'Nos pondremos en contacto con usted a la brevedad.'
                        }).then((result)=>{
                            window.location.href = 'index.php'; //Nos envia al inicio de la pagina
                        });
                    </script>
            <?php
                }
            
?>