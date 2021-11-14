<?php
    session_start();
    if(!isset($_SESSION['carrito'])){

        $_SESSION['carrito'] = array();
        
    }


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
    <div class="container dest"><!--destacados-->
        <div class="row">   
    <?php
        require_once('modelo/productos.php');
        $objP = new Productos();
        $respP = $objP->obtenerDestacados();
        foreach($respP as $productosDest){
     ?>
            
                <div class="col-xl-4 col-md-6 col-sm-12 mt-2">
                
                        <div class="card destacado draw meet"><!--draw meet-->
                            <div class="view overlay">
                                <img class="card-img-top" src="<?php echo $productosDest['foto1']?>" height="300px"
                                alt="Card image cap">
                                <a href="#">
                                <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body d-flex flex-column" style="height: 250px;">
                                <div class="d-flex flex-row" height="109px">
                                    <img src="<?php echo $productosDest['foto2']?>"width="35%" alt="sale" class="animated pulse infinite">
                                    <h4 class="card-title text-center align-items-center" width="65%"  style="margin-top: 29px; margin-left: 10px"><?php echo $productosDest['detalle']?></h4>
                                </div>
                                
                                <p class="card-text pesos text-center mt-3" height="21px"><?php echo $productosDest['precioSinIva']?></p>
                                <button height="48px" type="button" class="btn btn-primary d-flex align-items-end" onclick="agregarProducto(<?php echo $productosDest['idProductos']?>)">Agregar al Carrito</button>
                            </div>   
                        </div>
                
                </div>          
     <?php
        }
     ?>
        </div>   
    </div>
    <div class="container"><!--productos-->
        <div class="row">
             <?php
                    $idCategoria ='';//definimos variable
                    // verificamos si existe idCategoria por parametro..
                    if(isset($_REQUEST['idCategoria'])){

                        //le asignamos el valor que trae el parametro

                        $idCategoria = base64_decode($_REQUEST['idCategoria']);

                    }

                    //creamos un objeto de tipo producto

                    require_once('modelo/productos.php');
                    $objP = new Productos();
                    $respP = $objP->obtenerPorCategoria($idCategoria);
                    foreach($respP as $productos){ 
             ?>
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card-group">
                                    <div class="card consola">
                                        <div class="view overlay">
                                            <img class="card-img-top" src="<?php echo $productos['foto1']?>" height="300px"
                                            alt="Card image cap">
                                            <a href="#">
                                            <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <div class="card-body d-flex flex-column" style="height: 250px;">
                                            <h4 class="card-title text-center"><?php echo $productos['detalle']?></h4>
                                            <p class="card-text pesos text-center mt-3"><?php echo $productos['precioSinIva']?></p>
                                            <button type="button" class="btn btn-primary d-flex align-items-end" onclick="agregarProducto(<?php echo $productos['idProductos']?>)">Agregar al Carrito</button>
                                        </div>   
                                    </div>           
                                </div>
                            </div>
            <?php
                    }
            ?>
            </div>
        </div>
    </div> 
    <div id="carrito"></div> 
    <footer class="page-footer font-small mdb-color pt-4" id="footer1">
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
                    <p class="text-center text-md-left">© 2021 Copyright <label style="color: white; font-size: large; font-weight: bold;">"GameStore"</label> 
                        
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
    function agregarProducto(idProductos){
        //abrir la logica del carrito 
        $('#carrito').load('modelo/carrito.php?idProductos='+idProductos);
        $('#carrito_cantidad').load('modelo/actualizarCantidad.php');
        

    }

    

    
</script>