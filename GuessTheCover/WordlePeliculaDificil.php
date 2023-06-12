<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location:./login.php');
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="shortcut icon" href="logo/gtc1.png" type="image/x-icon">
    <title>Wordle Peliculas Dificil</title>
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
                    <a class="nav-link" href="registro.php">
                        <h3>Registrarse</h3>
                    </a>
                    <a class="nav-link" href="perfil.php">
                        <h3>Perfil</h3>
                    </a>
                    <a class="nav-link mr-5" href="ranking.php">
                        <h3>Ranking</h3>
                    </a>
                    <li class="nav-item dropdown mr-2 megamenu"><a id="megamenu" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle font-weight-bold text-uppercase">
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
                                                        <li class="nav-item"><a href="AdivinaPelicula.php" class="nav-link text-small pb-0">Películas</a></li>
                                                        <li class="nav-item"><a href="AdivinaJuegoFacil.php" class="nav-link text-small pb-0 ">Videjuegos</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6 col-lg-3 mb-4">
                                                    <h5 class="font-weight-bold text-uppercase">Wordles</h5>
                                                    <ul class="list-unstyled">
                                                        <li class="nav-item mt-5"><a href="wordlepeliculas.php" class="nav-link pb-0 ">Películas</a></li>
                                                        <li class="nav-item"><a href="wordlejuegos.php" class="nav-link  pb-0 ">Videjuegos </a></li>
                                                        <li class="nav-item"><a href="WordleJuegoDificil.php" class="nav-link  pb-0 ">Wordle Videojuegos </a></li>
                                                        <li class="nav-item"><a href="WordlePeliculaDificil.php" class="nav-link  pb-0 ">Wordle Peliculas </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown megamenu"><a id="megamenu" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle font-weight-bold text-uppercase">
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
                                                        <li class="nav-item"><a href="bibliotecaPeliculas.html" class="nav-link text-small pb-0">Películas</a></li>
                                                        <li class="nav-item"><a href="bibliotecaJuegos.html" class="nav-link text-small pb-0 ">Videjuegos</a>
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
            <button type="button" style="background-color: transparent;" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler order-md-3">
                <img src="imagenes/icons8-menú-48.png" alt="Descripción de la imagen">
            </button>

        </nav>
    </header>
    <style>
        body {
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        main {
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        .correct {
            color: rgb(75, 251, 32)
        }

        .incorrect {
            color: rgb(255, 10, 10);
        }

        .partial {
            color: orange;
        }

        .input-width {
            width: 200px;
            /* El ancho que desees */
        }

        .red-text {
            color: red;
            font-size: 30px;
        }

        .aviso-text {
            font-size: 30px;
        }

        .felicidades-text {
            color: rgb(75, 251, 32);
            font-size: 30px;
        }
        #message{
            font-size: 30px;
        }
    </style>
    </head>

    <body>
        <main class="container">
            <div class="container align-items-center justify-content-center">
                <h1 class="mt-5">Wordle películas</h1>
                <div class=" tutorial row justify-content-center text-center p-3">
                    <h3><strong> Las reglas son sencillas. Tendrás que adivinar la película misteriosa letra por letra en
                            un máximo de 10 intentos:
                            <ul>
                                <li style="color: rgb(75, 251, 32);">Letra verde: Has adivinado correctamente la letra y
                                    está en la posición correcta.</li>
                                <li style="color:  orange;">Letra naranja: Has adivinado la letra, pero no está en la
                                    posición correcta.</li>
                                <li style="color: red;">Letra roja: La película no contiene esa letra.</li>
                            </ul>
                            ¡Buena suerte en tu búsqueda de la película misteriosa!
                        </strong>
                    </h3>
                </div>
                <div class="d-flex align-items-center justify-content-center text-center mt-5" style="height: 10vh;">
                    <div class="input-group mb-3" style="width: 400px;">
                        <input type="text" id="guessInput" class="form-control mx-auto" maxlength="10" autocomplete="off">
                        <div class="input-group-append">
                            <button id="guessButton" class="btn btn-primary">Adivinar</button>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-5" style="margin-left: 100px;">
                    <table id="wordTable" class="text-center justify-content-center">
                        <tr class="text-center">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>

                <h2 class="mb-5">Intentos restantes: <span id="remainingAttempts">10</span></h2>




                <p id="message"></p>
            </div>
            </div>
        </main>
        <script src="./javascript/wordlepeliculadificil.js"></script>
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


</html>