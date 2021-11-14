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
        <div class="container card pt-20 pb-20 CardFinalizado">
            <form name="formulario">
                <div class="row justify-content-center mb-3">
                    <div class="col-xl-6 col-md-12">
                        <label for="apellidoNombreL">Apellido y Nombre</label>
                        <input type="text" class="form-control" id="apellidoNombre"  placeholder="Apellido y Nombre">
                    </div>
                    <div class="col-xl-3 col-md-4">
                        <label for="tipoDocL">Tipo de Documento</label>
                            <select id="tipoDoc" class="form-control">
                                <option value="DNI" selected>D.N.I</option>
                                <option value="CUIL">CUIL</option>
                                <option value="CUIT">CUIT</option>
                            </select>
                    </div>
                    <div class="col-xl-3 col-md-8">
                        <label for="documentoL">Nro. Documento</label>
                        <input type="number" class="form-control" id="documento"  placeholder="Numero Documento">
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-xl-5 col-md-12">
                        <label for="domicilioL">Domicilio</label>
                        <input type="text" class="form-control" id="domicilio"  placeholder="Domicilio">
                    </div>
                    <div class="col-xl-5 col-md-12">
                        <label for="localidadL">Localidad</label>
                        <input type="text" class="form-control" id="localidad"  placeholder="Localidad">
                    </div>
                    <div class="col-xl-2 col-md-12">
                        <label for="codPostalL">Cod. Postal</label>
                        <input type="number" class="form-control" id="codPostal"  placeholder="Cod. Postal">
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-xl-6 col-md-3">
                        <label for="telefonoL">Telefono</label>
                        <input type="number" class="form-control" id="telefono"  placeholder="Telefono">
                    </div>
                    <div class="col-xl-6 col-md-5">
                        <label for="localidadL">Email</label>
                        <input type="Email" class="form-control" id="email"  placeholder="Email">
                    </div>
                    <div class="col-xl-6 col-md-4">
                        <label for="localidadL">¿Envio?</label>
                        <div class="row justify-content-start">
                            <div class="col-auto ml-2">
                                <input class="form-check-input" type="radio" onchange="recalcularTotal(0)" name="exampleRadios" id="envio" value="N" checked>
                                <label class="form-check-label" for="envio">Retiro en Local</label>
                            </div>
                            <div class="col-auto ml-2">
                                <input class="form-check-input" type="radio" onchange="recalcularTotal(850)" name="exampleRadios" id="envio" value="S">
                                <label class="form-check-label" for="envio">Con Envío</label>
                            </div>
                        </div>
                            <div class="row justify-content-center">
                                <label class="form-check-label text-left" for="envio" style="font-size:10px;">Costo Envío $840.00</label>
                            </div>
                    </div>
                </div>
            </form>
            <?php
            if(is_array($_SESSION['carrito']) && count($_SESSION['carrito'])!=0 ){
            ?>
                <div class="d-flex align-items-end">
                    <div class="col-6">
                        <div class="row justify-content-start">
                            <a href="pedidos.php" class="btn btn-lg text-white" style="background: #6f3b6f;">VOLVER</a>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="row justify-content-end">
                            <h4>TOTAL:</h4>
                            <h4 id="totalizarPedido"></h4>
                        </div>
                        <div class="row justify-content-end">
                            <a class="btn btn-lg text-white" style="background: #557cbf;" onclick="validarFormulario()">FINALIZAR PEDIDO</a>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
        <div id="guardar">

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    function validarFormulario(){

        if(document.formulario.apellidoNombre.value.length==0){

            alert('INGRESE UN APELLIDO Y NOMBRE!');
            document.formulario.apellidoNombre.focus()
            return 0;
 
            
        }
        if(document.formulario.tipoDoc.value=='DNI'){
            if(document.formulario.documento.value.length!=8){

                alert('DOCUMENTO ERRONEO!')
                document.formulario.documento.focus()
            return 0;
            }


        }
        if(document.formulario.tipoDoc.value=='CUIT'||document.formulario.tipoDoc.value=='CUIL'){
            if(document.formulario.documento.value.length!=11){

            alert('CUIT/CUIL ERRONEO!')
            document.formulario.documento.focus()
            return 0;
            }

        }
        if(document.formulario.domicilio.value.length==0){

            alert('INGRESE UN DOMICILIO!');
            document.formulario.domicilio.focus()
            return 0;


        }
        if(document.formulario.localidad.value.length==0){

            alert('INGRESE UNA LOCALIDAD!');
            document.formulario.localidad.focus()
            return 0;


        }
        if(document.formulario.codPostal.value.length!=4){

            alert('CODIGO POSTAL ERRONEO!')
            document.formulario.codPostal.focus()
            return 0;
        }

        if(document.formulario.telefono.value.length==0){

            alert('TELEFONO ERRONEO!')
            document.formulario.telefono.focus()
            return 0;
        }
        if(document.formulario.email.value.length==0){

            alert('EMAIL ERRONEO!')
            document.formulario.email.focus()
            return 0;
        }
        
        $('#guardar').load('modelo/guardarPedido.php?apellidoNombre=' + escape(document.formulario.apellidoNombre.value)  + 
                                                '&tipoDoc=' + document.formulario.tipoDoc.value  + 
                                                '&documento=' + document.formulario.documento.value +
                                                '&domicilio=' + escape(document.formulario.domicilio.value) +
                                                '&localidad=' + escape(document.formulario.localidad.value) +
                                                '&codPostal=' + document.formulario.codPostal.value + 
                                                '&telefono=' + document.formulario.telefono.value +
                                                '&email=' + escape(document.formulario.email.value) + 
                                                '&envio=' + document.formulario.envio.value
        );
        



    }
    

</script>