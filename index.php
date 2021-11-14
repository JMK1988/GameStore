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
                <a class="nav-link" href="#novedades">Novedades</a>
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
        <!--carrusel-->
        <div class="container carrusel">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-2" data-slide-to="1"></li>
                    <li data-target="#carousel-example-2" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active imgcarr">
                        <div class="view imgcarr">
                        <img class="d-block w-100" src="images/juegos/starcraft2.png"
                            alt="First slide">
                        <div class="mask"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive">StarCraft 2</h3>
                        <p>Vuelve la obra maestra de Blizzard</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="view imgcarr">
                        <img class="d-block w-100" src="images/juegos/battlefield5.png"
                            alt="Second slide">
                        <div class="mask"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive">BattleField V</h3>
                        <p>Vive el mayor conflicto de la humanidad</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="view imgcarr">
                        <img class="d-block w-100"  src="images/juegos/mortalkombat11.png"
                            alt="Third slide">
                        <div class="mask"></div>
                        </div>
                        <div class="carousel-caption">
                        <h3 class="h3-responsive">Mortal Kombat 11</h3>
                        <p>La saga del fatality hace su entrada triunfal en la nueva generación de consolas</p>
                        </div>
                    </div>
                    </div>
                    <!--/.Slides-->
                    <!--Control-->
                    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                    </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        </div>   
        <!--banners-->
        <div class="container">
            <div class="row banner">
                <div class="col-sm-12">
                    <a href="accesorios.php"><img class="img-fluid" src="images/banner 1.png" alt="banner 1"></a> 
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row banner">
                <div class=" col-sm-12 ">
                    <img class="img-fluid" id="novedades" src="images/banner2.png" alt="banner 2">
                </div>
            </div>
        </div>
        <!--novedades-->
        <div class="container nove">
            <div class="row ">
                <div class="col-md-12">
                    <h2 class="font-weight-bold text-center"  style="color: whitesmoke; margin:0px"> 
                        Novedades
                    </h2>
                </div>
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card noticia">
                            <div class="view overlay">
                                <img class="card-img-top" src="images/juegos/forza5.jpg" height="200px"
                                alt="Card image cap">
                                <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body" style="height: 300px;">
                                <h4 class="card-title">Forza Horizon 5</h4>
                                <p class="card-text">El título de conducción de Playground Games, uno de los videojuegos más aclamados del Xbox & Bethesda Games Showcase, saldrá en noviembre.</p>
                                <a href="#" class="btn btn-primary">LEER MÁS >></a>
                            </div>   
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card noticia">
                        <div class="view overlay">
                                <img class="card-img-top" src="images/juegos/psstore.jpeg" height="200px"
                                alt="Card image cap">
                                <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                                </a>
                        </div>
                        <div class="card-body" style="height: 300px;">
                                <h4 class="card-title">Sony elimina la antigua web de PS Store</h4>
                                <p class="card-text">Sony elimina la antigua web de PS Store, utilizada para comprar juegos de PS3, Vita y PSPAunque la nueva versión se lanzó hace unos meses.</p>
                                <a href="#" class="btn btn-primary">LEER MÁS >></a>
                        </div>   
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card noticia">
                        <div class="view overlay">
                            <img class="card-img-top" src="images/consolas/Consolas-PlayStation.jpg" height="200px"
                            alt="Card image cap">
                            <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body" style="height: 300px;">
                                <h4 class="card-title">PS5: Una patente levanta especulaciones sobre la compatibilidad con PS3, PS2 y PSX</h4>
                                <p class="card-text">Sony ha registrado una patente que ha provocado que los jugadores especulen sobre la llegada de la retrocompatibilidad a PlayStation 5 con juegos de PlayStation.</p>
                                <a href="#" class="btn btn-primary">LEER MÁS >></a>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    
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
                        <a href="intranet.php">
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
  $('#carrito_cantidad').load('modelo/actualizarCantidad.php')
</script>