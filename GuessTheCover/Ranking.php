<?php
session_start(); // Inicia la sesión

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$nombre_usuario = $_SESSION['username'];
$idUsuario = $_SESSION['idUsuario'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Perfil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/styleperfil.css">
    <link rel="shortcut icon" href="logo/gtc1.png" type="image/x-icon">
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
                                                        <li class="nav-item"><a href="AdivinaJuegoFacil.php" class="nav-link text-small pb-0 ">Videjuegos</a>
                                                        <li class="nav-item"><a href="AdivinaPelicula.php" class="nav-link text-small pb-0">Películas</a></li>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <h5 class="font-weight-bold text-uppercase">Wordles</h5>
                <ul class="list-unstyled">
                    <li class="nav-itemm"><a href="wordlejuegospanel.php" class="nav-link  pb-0 ">Videjuegos- facil </a></li>
                    <li class="nav-itemm"><a href="wordlepeliculaspanel.php" class="nav-link pb-0 ">Películas-fácil</a></li>
                    <li class="nav-itemm"><a href="WordleJuegoDificil.php" class="nav-link  pb-0 ">Videojuegos-difícil </a></li>
                    <li class="nav-itemm inline-block;"><a href="WordlePeliculaDificil.php" class="nav-link  pb-0 "> Peliculas-difícil </a></li>
                </ul>
                <style>
                    .nav-itemm {
                        display: inline-block;
                    }
                </style>
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
                                                <li class="nav-item"><a href="bibliotecaJuegos.html" class="nav-link text-small pb-0 ">Videjuegos</a>
                                                <li class="nav-item"><a href="bibliotecaPeliculas.html" class="nav-link text-small pb-0">Películas</a></li>

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

    <main class="row m-5">
        <div class="col d-flex flex-column align-items-center justify-content-center">
            <?php
            function obtenerImagenUsuario($nombreUsuario)
            {
                // Conectar a la base de datos
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "guess_the_cover";

                $conexion = mysqli_connect($servername, $username, $password, $dbname);

                // Verificar si la conexión fue exitosa
                if (!$conexion) {
                    echo "La conexión a la base de datos falló: " . mysqli_connect_error();
                    exit;
                }

                // Obtener la URL de la imagen del usuario
                $sql = "SELECT imagen_url FROM usuario WHERE usuario = '$nombreUsuario'";
                $resultado = mysqli_query($conexion, $sql);

                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    $row = mysqli_fetch_assoc($resultado);
                    return $row['imagen_url'];
                }

                // Si no se encuentra la imagen, se puede retornar una URL de imagen predeterminada
                // o un valor nulo, dependiendo de tus necesidades
                return null;
            }


            // Incluir archivo con la conexión a la base de datos
            require_once "conexionBDRegistro.php";

            // Conectar a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "guess_the_cover";

            $conexion = mysqli_connect($servername, $username, $password, $dbname);

            // Verificar si la conexión fue exitosa
            if (!$conexion) {
                echo "La conexión a la base de datos falló: " . mysqli_connect_error();
                exit;
            }

            // Obtener los nombres de usuario y sus puntuaciones más altas
            $sql = "SELECT u.usuario, MAX(p.puntuacion) AS puntuacion
                FROM usuario u
                INNER JOIN puntuacion p ON u.idUsuario = p.idRelacion
                WHERE p.idJuego = 1 AND u.ban = '0'
                GROUP BY u.usuario
                ORDER BY puntuacion DESC";
            $resultado = mysqli_query($conexion, $sql);

            if ($resultado) {
                if (mysqli_num_rows($resultado) > 0) {
                    // Mostrar los nombres de usuario y sus puntuaciones más altas en HTML
                    echo '<div class="col d-flex flex-column align-items-center justify-content-center">';
                    echo '<div class="contenedorresultados">';
                    echo '<h1 class="text-center" id="top">TOP PUNTUACIONES DE VIDEOJUEGOS</h1>';
                    echo '<div id="resultsranking">';

                    $count = 0; // Contador para los tres primeros nombres

                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $nombreUsuario = $row["usuario"];
                        $puntuacion = $row["puntuacion"];

                        $imagenUsuario = obtenerImagenUsuario($nombreUsuario); // Obtener la URL de la imagen de perfil

                        echo "<div class='resultado mb-3'>";

                        if ($count == 0) {
                            echo "<h3 class='nombre-usuario mt-3' style='color: goldenrod;'>$nombreUsuario</h3>";
                        } elseif ($count == 1) {
                            echo "<h3 class='nombre-usuario mt-3' style='color: silver;'>$nombreUsuario</h3>";
                        } elseif ($count == 2) {
                            echo "<h3 class='nombre-usuario mt-3' style='color: #cd7f32;'>$nombreUsuario</h3>";
                        } else {
                            echo "<h3 class='nombre-usuario'>$nombreUsuario</h3>";
                        }
                        echo "<img src='../carpetaAvatares/$imagenUsuario' alt='‎' class='imagen-perfil mr-5' style='width: 100px; height: 90px; border-radius: 50%;'>";

                        if ($count < 3) {
                            if ($count == 0) {
                                echo "<img src='./imagenes/oro.png' alt='Trofeo de oro' class='trophy-img' /><br>";
                                echo "<br><h3 style='color: goldenrod;'>Puntuación más alta: $puntuacion</h3> <br>";
                            } elseif ($count == 1) {
                                echo "<img src='./imagenes/plata.png' alt='Trofeo de Plata' class='trophy-img'/><br>";
                                echo "<br><h3 class='mb-3' style='color: silver;'>Puntuación más alta: $puntuacion</h3><br>";
                            } elseif ($count == 2) {
                                echo "<img src='./imagenes/bronze.png' alt='Trofeo de Bronce' class='trophy-img'/><br>";
                                echo "<br><h3 style='color: #cd7f32;'>Puntuación más alta: $puntuacion</h3><br>";
                            }
                        } else {
                            echo "<br><h3 class='mt-3' style='color: rgb(43, 142, 223);'>Puntuación más alta: $puntuacion</h3> <br>";
                        }

                        echo "</div>";

                        $count++;
                    }

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>






        </div>
        <?php
        // Incluir archivo con la conexión a la base de datos
        require_once "conexionBDRegistro.php";

        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "guess_the_cover";

        $conexion = mysqli_connect($servername, $username, $password, $dbname);

        // Verificar si la conexión fue exitosa
        if (!$conexion) {
            echo "La conexión a la base de datos falló: " . mysqli_connect_error();
            exit;
        }

        // Obtener los nombres de usuario y sus puntuaciones más altas
        $sql = "SELECT u.usuario, MAX(p.puntuacion) AS puntuacion
        FROM usuario u
        INNER JOIN puntuacion p ON u.idUsuario = p.idRelacion
        WHERE p.idJuego = 2 AND u.ban = '0'
        GROUP BY u.usuario
        ORDER BY puntuacion DESC";
        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            if (mysqli_num_rows($resultado) > 0) {
                // Mostrar los nombres de usuario y sus puntuaciones más altas en HTML
                echo '<div class="col mt-3 d-flex flex-column align-items-center justify-content-center">';
                echo '<div class="contenedorresultados">';
                echo '<h1 class="text-center" id="top">TOP PUNTUACIONES DE PELÍCULAS</h1>';
                echo '<div id="resultsranking">';

                $count = 0; // Contador para los tres primeros nombres

                while ($row = mysqli_fetch_assoc($resultado)) {
                    $nombreUsuario = $row["usuario"];
                    $puntuacion = $row["puntuacion"];

                    $imagenUsuario = obtenerImagenUsuario($nombreUsuario); // Obtener la URL de la imagen de perfil

                    echo "<div class='resultado mb-3'>";

                    if ($count == 0) {
                        echo "<h3 class='nombre-usuario mt-3 ' style='color: goldenrod;'>$nombreUsuario</h3>";
                    } elseif ($count == 1) {
                        echo "<h3 class='nombre-usuario mt-3' style='color: silver;'>$nombreUsuario</h3>";
                    } elseif ($count == 2) {
                        echo "<h3 class='nombre-usuario mt-3' style='color: #cd7f32;'>$nombreUsuario</h3>";
                    } else {
                        echo "<h3 class='nombre-usuario'>$nombreUsuario</h3>";
                    }
                    echo "<img src='../carpetaAvatares/$imagenUsuario' alt='‎' class='imagen-perfil mr-5' style='width: 100px; height: 90px; border-radius: 50%;'>";

                    if ($count < 3) {
                        if ($count == 0) {
                            echo "<img src='./imagenes/oro.png' alt='Trofeo de oro' class='trophy-img' /><br>";
                            echo "<br><h3 style='color: goldenrod;'>Puntuación más alta: $puntuacion</h3> <br>";
                        } elseif ($count == 1) {
                            echo "<img src='./imagenes/plata.png' alt='Trofeo de Plata' class='trophy-img'/><br>";
                            echo "<br><h3 class='mb-3' style='color: silver;'>Puntuación más alta: $puntuacion</h3><br>";
                        } elseif ($count == 2) {
                            echo "<img src='./imagenes/bronze.png' alt='Trofeo de Bronce' class='trophy-img'/><br>";
                            echo "<br><h3 style='color: #cd7f32;'>Puntuación más alta: $puntuacion</h3><br>";
                        }
                    } else {
                        echo "<br><h3 class='mt-3' style='color: rgb(43, 142, 223);'>Puntuación más alta: $puntuacion</h3> <br>";
                    }

                    echo "</div>";

                    $count++;
                }

                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<h3>Todavía no hay puntuaciones registradas.</h3>';
            }
        } else {
            echo 'Error al obtener los datos.';
        }
        ?>

    </main>

    <footer class="text-center textofooter">
    <section>
        <div class="text-center text-sm-start mt-2">
            <div class="row mt-4">
                <div class="col-sm-6 col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h5 class="text-uppercase fw-bold border-bottom border-primary">INFORMACION</h5>
                    <p><a href="sobreNosotros.html" class="sinestilo">Sobre nosotros</a></p>
                    <p><a href="politicaPrivacidad.html" class="sinestilo">Politica de Privacidad</a></p>
                    <p><a href="contacto.html" class="sinestilo">Contacto</a></p>
                </div>
                <div class="col-sm-6 d-flex col-md-2 col-lg-2 col-xl-2 mx-auto mb-5 border-end border-start border-dark justify-content-center">
                    <div class="text-center imgfooter">
                        <h5>GUESS THE COVER</h5>
                        <img src="logo/gtc1.png" class="imgfooter" alt="Logo">
                    </div>
                </div>
                <div class="col-sm-6 col-md-2 col-lg-4 col-xl-3 mx-auto mb-md-0 mb-2">
                    <h5 class="text-uppercase fw-bold border-bottom border-primary">Redes sociales</h5>
                    <a href="https://www.instagram.com/"> <img src="imagenes/icons8-instagram-48.png" class=" imgtamano3" alt="instagram"> </a>

                    <a href="https://www.facebook.com/"> <img src="imagenes/icons8-facebook-48.png" class=" imgtamano3" alt="facebook"> </a>

                    <a href="https://twitter.com/"> <img src="imagenes/icons8-twitter-48.png" class=" imgtamano3" alt="twitter"> </a>

                    <a href="https://www.reddit.com/"> <img src="imagenes/reditt-removebg-preview(3).png" class=" imgtamano3" alt="reditt"> </a>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
</footer>

</body>


</html>