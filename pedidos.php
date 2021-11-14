<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Plugin file -->
    <link rel="stylesheet" href="./css/addons/datatables.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
    <!--whatsapp-->
    <div class="container">
        <div class="row wsp">
            <a href="https://api.whatsapp.com/send?phone=+543413219406"><img class="what wsp animated pulse infinite" src="images/Recurso 2.png" alt="wsp"></a> 
        </div>
    </div>
    <!--Navegador-->
    <nav class="navbar navbar-expand-lg navbar-dark navegador">

        <!-- Logo -->
        <a class="navbar-brand" href="index.php" id="logo">
            <img src="images/logo.png" height="100" alt="mdb logo">
        </a>
    
        <!-- barra -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="basicExampleNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Inicio
                 <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Productos</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <?php   
                require_once('modelo/categorias.php');
                $objC = new Categorias(); 
                $respC = $objC->obtener();
                foreach($respC as $categorias){
                    echo "<a class='dropdown-item' href='juegos.php?idCategoria=".base64_encode($categorias['idCategoria'])."'>".$categorias['detalle']."</a>";
                }
            ?>                
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Novedades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#footer1">Contactanos</a>
            </li>
    
        </ul>
        <!--buscador
        <form class="form-inline">
            <div class="md-form my-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
        </form>-->
        <!--carrito-->
        <a class="navbar-brand" href="pedidos.php">
            <img src="images/shopping-cart.png" height="30" alt="mdb logo">
            <span class="cantidad" id="carrito_cantidad">
                <div id="cantidad"></div><!--mostrar numero-->
            </span>
        </a>
        </div>
    </nav>
    <section>
        <div class="container dest">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="text-center">
                        <h2 class="font-weight-bold" style="color: white; text-shadow: 5px 5px 10px black;">Carrito de Compras</h2>
                    </div>
                </div>
            </div>  
            <table class="table">
                <caption class="font-weight-bold" style="color: white; text-shadow: 5px 5px 10px black;">Tu Pedido!</caption>
                <thead class="thead-dark"> 
                    <tr>
                    <th scope="w-40">Productos</th>
                    <th scope="w-20 text-right">Precio</th>
                    <th scope="w-20 text-center">Cantidad</th>
                    <th scope="w-20 text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        //verificar si existe el arreglo carrito y verificar si este tiene datos
                        if(is_array($_SESSION['carrito']) && count($_SESSION['carrito'])!=0){
                            //si es que existe y tiene datos pasa por aca
                            foreach($_SESSION['carrito'] as $carrito){
                    ?>
                        <tr>
                            <td>
                                <div class="row align-items-center">
                                    <img src="<?php echo $carrito['foto1']?>" height="50px" width="50px">
                                    <label class="d-none d-md-block" style="padding-left: 20px;"> <?php echo $carrito['detalle']?></label>
                                </div>
                            </td>
                            <td class="text-left align-middle">
                                $<?php echo number_format($carrito['precioSinIva'], 2,'.','') ?>
                            </td>
                            <td class="text-left align-middle">
                                <?php echo $carrito['cantidad']?>
                            </td>
                            <td class="text-left align-middle font-weight-bold">
                                $<?php echo number_format(($carrito['precioSinIva']*$carrito['cantidad']), 2,'.','') ?> 
                            </td>
                        </tr>


                    <?php

                            }
                        }
                        else{
                            //si el carrito no existe o esta vacio pasa por aca
                     ?>
                        <tr>
                            <td colspan="4" class="text-center font-weight-bold" style="color: white">El carrito esta vacio</td>
                        </tr>

                    <?php
                        }
                        //recorrer el carrito y mostrar todos los elementos necesarios

                   
                   
                    ?>
                </tbody>
            </table>
            <?php
             if(is_array($_SESSION['carrito']) && count($_SESSION['carrito'])!=0){
                 
            ?>
            <div class="row justify-content-center">
                <a href="finalizarPedido.php" class="btn btn-lg btn-danger text-white">Finalizar pedido</a>
                <h4 class="font-weight-bold">TOTAL: </h4>
                <h4 class="font-weight-bold" id="totalizarPedido"></h4>
            </div>
            <?php
             }
            ?>
        </div>
    </section>   
    <footer class="page-footer font-small mdb-color pt-4" style="height: 100%;" id="footer1">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left mt-3 pb-3">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 style="color: white;" class="text-uppercase mb-4 font-weight-bold">GameStore</h6>
                    <p style="color: white;">Siempre junto a vos. Nos encanta tomar mate y jugar a cuanto juego de Play podamos.
                        Queremos saber de vos. ¡Seguinos en nuestras redes!.</p>
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-black-slight mx-1">
                                <i style="font-size: 30px;" class="fab fa-facebook white-text"></i>
                            </a>
                            </li>
                            <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-black-slight mx-1">
                                <i style="font-size: 30px;" class="fab fa-instagram white-text"> </i>
                            </a>
                            </li>
                            
                        </ul>
                </div>
                <hr class="w-100 clearfix d-md-none">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <a href="index.php"><img src="images/logo.png" height="200" alt="logo"></a> 
                    </div>
                <hr class="w-100 clearfix d-md-none">
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 style="color: white;" class="text-uppercase mb-4 font-weight-bold">Contacto</h6>
                <p style="color: white;">
                    <i class="fas fa-home mr-3"></i>Direccion</p>
                <p style="color: white;">
                    <i class="fas fa-envelope mr-3"></i>Mail</p>
                <p style="color: white;">
                    <i class="fas fa-phone mr-3"></i>Telefono 1</p>
                <p style="color: white;">
                    <i class="fas fa-phone mr-3"></i>Telefono 2</p>
                </div>
            </div>
                <hr>
            <div class="row d-flex align-items-center">
                    <div class="col-md-7 col-lg-8">
                    <p class="text-center text-md-left">© 2021 Copyright <a href="#" style="color: white; font-size: large; font-weight: bold;">"GameStore"</a> 
                        
                    </p>
                    </div>
                    <div class="col-md-5 col-lg-4 ml-lg-0">
                    <div class="text-center text-md-right">
                        <a href="#">
                            <strong style="color: black;">Desing by Juan Marcos Kruppa</strong>
                        </a>
                    </div>
                    </div>
            </div>
        </div>
    </footer>



    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Plugin file -->
    <script src="./js/addons/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
          $('#dtBasicExample').DataTable();
          $('.dataTables_length').addClass('bs-select');
        });
      </script>
</body>
</html>
<script>
    $('#carrito_cantidad').load('modelo/actualizarCantidad.php');
    $('#totalizarPedido').load('modelo/totalizarPedido.php');
    function recalcularTotal(costo){
        $('#totalizarPedido').load('modelo/totalizarPedido.php?costo='+costo);
    }
</script>