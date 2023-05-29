<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/stylewordle.css">
    <script src="https://d3js.org/d3.v6.min.js"></script>
    <link rel="shortcut icon" href="logo/gtc1.png" type="image/x-icon">
    <title>Wordle Juegos</title>
</head>

<body>
<header>
            <nav class="navbar navbar-expand-lg  py-3 fixed-top">
                <a class="navbar-brand" href="index.html">
                    <img src="logo/gtc1.png" class="d-inline-block align-top logonavbar" alt="">
                </a>
                <div id="navbarContent" class="collapse navbar-collapse order-sm-12 order-lg-1">
                    <ul class="navbar-nav ml-auto">
                        <!-- Megamenu-->
                        <a class="nav-link" href="perfil.php">
                            <h3>Perfil</h3>
                        </a>
                        <a class="nav-link" href="ranking.php">
                            <h3>Ranking</h3>
                        </a>
                        <a class="nav-link mr-5" href="registro.php">
                            <h3>Registrarse</h3>
                        </a>
                        <li class="nav-item dropdown mr-2 megamenu"><a id="megamenu" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"
                                class="nav-link dropdown-toggle font-weight-bold text-uppercase">
                                <h5>Juegos</h5>
                            </a>
                            <div aria-labelledby="megamenu" class="dropdown-menu border-0 p-0 m-0">
                                <div class="container-fluid" style="  background-color: rgba(0, 0, 0, 0.932)">
                                    <div class="row rounded-0 m-0 shadow-sm">
                                        <div class="col-12">
                                            <div class="p-4">
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-3 mr-5 mb-4">
                                                        <h5 class="text-uppercase">Guess The Cover</h5>
                                                        <ul class="list-unstyled">
                                                            <li class="nav-item"><a href="AdivinaPelicula.php"
                                                                    class="nav-link text-small pb-0">Películas</a></li>
                                                            <li class="nav-item"><a href="AdivinaJuegoFacil.php"
                                                                    class="nav-link text-small pb-0 ">Videjuegos</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-3 mb-4">
                                                        <h5 class="font-weight-bold text-uppercase">Wordles</h5>
                                                        <ul class="list-unstyled">
                                                            <li class="nav-item mt-5"><a href="wordlepeliculas.php"
                                                                    class="nav-link pb-0 ">Películas</a></li>
                                                            <li class="nav-item"><a href="wordlejuegos.php"
                                                                    class="nav-link  pb-0 ">Videjuegos </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown megamenu"><a id="megamenu" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"
                                class="nav-link dropdown-toggle font-weight-bold text-uppercase">
                                <h5>Bibliotecas</h5>
                            </a>
                            <div aria-labelledby="megamenu" class="dropdown-menu border-0 p-0 m-0">
                                <div class="container-fluid" style="  background-color: rgba(0, 0, 0, 0.932)">
                                    <div class="row rounded-0 m-0 shadow-sm">
                                        <div class="col-12">
                                            <div class="p-4">
                                                <div class="row">
                                                    <div class="col-sm-6 col-lg-3 mr-5 mb-4">
                                                        <ul class="list-unstyled">
                                                            <li class="nav-item"><a href="bibliotecaPeliculas.html"
                                                                    class="nav-link text-small pb-0">Películas</a></li>
                                                            <li class="nav-item"><a href="bibliotecaJuegos.html"
                                                                    class="nav-link text-small pb-0 ">Videjuegos</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <button type="button" style="background-color: transparent;" data-toggle="collapse"
                    data-target="#navbarContent" aria-controls="navbars" aria-expanded="false"
                    aria-label="Toggle navigation" class="navbar-toggler order-md-3">
                    <img src="imagenes/icons8-menú-48.png" alt="Descripción de la imagen">
                </button>

            </nav>
        </header>



    <main class="row m-5 my-main">
        <div class="col d-flex  align-items-center justify-content-center">
            <div class="d-flex flex-column align-items-center justify-content-center mb-3">
        
                <h1>Wordle de Videojuegos</h1>
                  <div id="wordle"></div>
    <button id="new-wordle-button">Nueva palabra</button>

            </div>
            

        </div>
    </main>




</body>

<footer class="text-center textofooter">


    <section class="">
        <div class="container text-center text-md-start mt-2">
            <div class="row mt-4">

                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                    <h5 class="text-uppercase fw-bold border-bottom border-primary">INFORMACION</h5>
                    <p> <a href="sobreNosotros.html" class="sinestilo"> Sobre nosotros</a></p>
                    <p> <a href="politicaPrivacidad.html" class="sinestilo">Politica de Privacidad</a></p>
                    <p> <a href="contacto.html" class="sinestilo">Contacto</a></p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-5 border-end border-start border-dark">
                    <div class="text-center imgfooter">
                        <h3>GUESS THE COVER</h3>
                        <img src="logo/gtc1.png" class="imgfooter" alt="Logo">
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-2">
                    <h5 class="text-uppercase fw-bold border-bottom border-primary">Redes sociales</h5>
                    <!-- <img src="logo/icons8-tik-tok-94.png" class=" imgtamano3 " alt="tiktok">                           
                    <img src="logo/icons8-instagram-48.png" class=" imgtamano3" alt="instagram">
                    <img src="logo/icons8-facebook-nuevo-48.png" class=" imgtamano3" alt="facebook">
                    <img src="logo/icons8-twitter-48.png" class=" imgtamano3" alt="twitter"> -->
                </div>
            </div>

        </div>
    </section>

</footer>
<script src="./javascript/wordle.js"></script>

</html>