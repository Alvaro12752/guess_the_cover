<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$nombre_usuario = $_SESSION['username'];
$idUsuario = $_SESSION['idUsuario'];

if (isset($_POST['logout'])) { // Si se ha enviado el formulario de cerrar sesión
    session_destroy(); // Destruye la sesión
    header('Location: login.php'); // Redirige al usuario a la página de inicio de sesión
    exit();
}
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
                    <a class="nav-link" href="perfil.php">
                        <h3>Perfil</h3>
                    </a>
                    <a class="nav-link" href="ranking.php">
                        <h3>Ranking</h3>
                    </a>
                    <a class="nav-link mr-5" href="registro.php">
                        <h3>Registrarse</h3>
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



    <main class="">
        <?php
        if (isset($_SESSION['username']) && isset($_POST['submit'])) {
            $nombre_usuario = $_SESSION['username'];
            $directory = "./imagenes/$nombre_usuario/";

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $target_file = $directory . basename($_FILES["fileToUpload"]["name"]);

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // Actualizar la ruta de la imagen en la base de datos
                $imagen_url = $target_file; // Obtener la ruta de la imagen

                // Establecer la conexión a la base de datos
                $conexion = mysqli_connect("localhost", "root", "", "guess_the_cover");

                // Verificar la conexión
                if (!$conexion) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                // Escapar la ruta de la imagen para evitar inyección de SQL
                $imagen_url = mysqli_real_escape_string($conexion, $imagen_url);

                // Construir la consulta SQL para actualizar la ruta de la imagen
                $sql = "UPDATE usuario SET imagen_url = '$imagen_url' WHERE usuario = '$nombre_usuario'";

                // Ejecutar la consulta SQL
                if (mysqli_query($conexion, $sql)) {
                } else {
                    echo "<h3>Error al subir la imagen.</h3>" . mysqli_error($conexion);
                }

                // Cerrar la conexión a la base de datos
                mysqli_close($conexion);
            } else {
                echo "Error al subir el archivo.";
            }
        }
        // Obtener la ruta de la imagen desde la base de datos para mostrarla en pantalla
        if (isset($_SESSION['username'])) {
            $nombre_usuario = $_SESSION['username'];

            $servername = "localhost";
            $db_username = "root";
            $db_password = '';
            $db_name = "guess_the_cover";
            $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

            if (!$conn) {
                die("La conexión a la base de datos falló: " . mysqli_connect_error());
            }

            $select_sql = "SELECT imagen_url FROM usuario WHERE usuario = '$nombre_usuario'";
            $result = mysqli_query($conn, $select_sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $imagen_url = $row["imagen_url"];

                // Mostrar la imagen en pantalla
                // echo '<img src="' . $imagen_url . '" alt="Imagen del usuario">';
            }

            mysqli_close($conn);
        }
        ?>

        <div class="overflow-hidden">
            <div class="row mt-5">
                <?php
                // Obtener la ruta de la imagen desde la base de datos para mostrarla en pantalla
                if (isset($_SESSION['username'])) {
                    $nombre_usuario = $_SESSION['username'];

                    $servername = "localhost";
                    $db_username = "root";
                    $db_password = '';
                    $db_name = "guess_the_cover";
                    $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

                    if (!$conn) {
                        die("La conexión a la base de datos falló: " . mysqli_connect_error());
                    }

                    $select_sql = "SELECT imagen_url FROM usuario WHERE usuario = '$nombre_usuario'";
                    $result = mysqli_query($conn, $select_sql);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        $imagen_url = $row["imagen_url"];
                    }

                    mysqli_close($conn);
                }
                ?>
                <div class="col-md-3 mt-3 ml-3 text-center align-items-center" style="text-align: center;">
                    <div class="align-items-center">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                            <div class="mt-3 text-center">
                                <label for="fileToUpload" class="d-block mb-3">
                                    <h3 class="mb-0"><?php echo $nombre_usuario ?></h3>
                                    <?php if (!empty($imagen_url)) : ?>
                                        <img style="margin-top: 20px; width:300px; height:300px; border-radius:150px;" src="<?php echo $imagen_url; ?>" alt="Imagen de perfil" class="img-fluid imgp" onclick="document.getElementById('fileToUpload').click();">
                                    <?php else : ?>
                                        <img src="./imagenes/fotoperfil.png" alt="Imagen predefinida" class="img-fluid imgp" onclick="document.getElementById('fileToUpload').click();">
                                    <?php endif; ?>
                                </label>
                                <input type="file" class="form-control-file d-none" name="fileToUpload" id="fileToUpload">
                            </div>
                            <button type="submit" class="btn btn-primary" style="color: black;" name="submit">Cambiar imagen de perfil</button>
                        </form>
                        <div class="mt-5 mb-5 text-align-center">
                            <form method="post">
                                <button type="submit" class="btn btn-primary" style="color: black;" name="logout">Cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php


                // Incluir archivo con la conexión a la base de datos
                require_once "conexionBDRegistro.php";

                // Obtener la imagen_url del usuario actual desde la base de datos y almacenarla en una variable de sesión
                if (isset($_SESSION['username'])) {
                    $nombre_usuario = $_SESSION['username'];

                    $servername = "localhost";
                    $db_username = "root";
                    $db_password = '';
                    $db_name = "guess_the_cover";
                    $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

                    if (!$conn) {
                        die("La conexión a la base de datos falló: " . mysqli_connect_error());
                    }

                    $select_sql = "SELECT imagen_url FROM usuario WHERE usuario = '$nombre_usuario'";
                    $result = mysqli_query($conn, $select_sql);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['image_url'] = $row["imagen_url"];
                    }

                    mysqli_close($conn);
                }
                $servername = "localhost";
                $db_username = "root";
                $db_password = "";
                $db_name = "guess_the_cover";

                // Establecer la conexión a la base de datos
                $conexion = mysqli_connect($servername, $db_username, $db_password, $db_name);

                // Verificar si la conexión fue exitosa
                if (!$conexion) {
                    die("La conexión a la base de datos falló: " . mysqli_connect_error());
                }

                // Obtener todas las puntuaciones y números de partida del usuario logueado en orden descendente

                $sql = "SELECT puntuacion, partida FROM puntuacion WHERE idRelacion = $idUsuario AND idJuego = 1 ORDER BY puntuacion DESC";
                $resultado = mysqli_query($conexion, $sql);

                if ($resultado) {
                    if (mysqli_num_rows($resultado) > 0) {
                        // Mostrar las puntuaciones y números de partida en HTML
                        echo '<div class="col-md-4 mb-5 d-flex flex-column">';
                        echo '<div class="contenedorresultados">';
                        echo '<h1 class="text-center">Historial de Videojuegos</h1>';
                        echo '<div id="results">';
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $puntuacion = $row["puntuacion"];
                            $numeroPartida = $row["partida"];

                            echo "<div class='resultado'>";

                            if (isset($_SESSION['image_url'])) {
                                $image_url = $_SESSION['image_url'];
                                echo "<div style='display: inline-flex; align-items: center;'>";
                                echo "<img style='margin-top: 20px; width:55px; height:55px; border-radius:150px;' src='$image_url' alt='' class='img-fluid'>";
                                echo "<h3 style='margin-left: 10px; margin-top: 20px; color: #2b8edf;'>Partida $numeroPartida - Puntuación: $puntuacion</h3>";
                                echo "</div>";
                            } else {
                                echo "<br><br><h3 style='color: #2b8edf';>Partida $numeroPartida - Puntuación: $puntuacion</h3>";
                            }

                            echo "</div>";
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo "<div class='col-md-3' style='display: inline-flex; align-items: center;'>";
                        echo '<h3>Todavia no hay puntuaciones registradas.</h3>';
                        echo '</div>';
                    }
                } else {
                    echo "<div style='display: inline-flex; align-items: center;'>";
                    echo "Error al obtener las puntuaciones: " . mysqli_error($conexion);
                    echo "</div>";
                }

                // Cerrar la conexión a la base de datos
                mysqli_close($conexion);
                ?>
                <?php
                // Incluir archivo con la conexión a la base de datos
                require_once "conexionBDRegistro.php";

                // Obtener la imagen_url del usuario actual desde la base de datos y almacenarla en una variable de sesión
                if (isset($_SESSION['username'])) {
                    $nombre_usuario = $_SESSION['username'];

                    $servername = "localhost";
                    $db_username = "root";
                    $db_password = '';
                    $db_name = "guess_the_cover";
                    $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

                    if (!$conn) {
                        die("La conexión a la base de datos falló: " . mysqli_connect_error());
                    }

                    $select_sql = "SELECT imagen_url FROM usuario WHERE usuario = '$nombre_usuario'";
                    $result = mysqli_query($conn, $select_sql);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['image_url'] = $row["imagen_url"];
                    }

                    mysqli_close($conn);
                }
                $servername = "localhost";
                $db_username = "root";
                $db_password = "";
                $db_name = "guess_the_cover";

                // Establecer la conexión a la base de datos
                $conexion = mysqli_connect($servername, $db_username, $db_password, $db_name);

                // Verificar si la conexión fue exitosa
                if (!$conexion) {
                    die("La conexión a la base de datos falló: " . mysqli_connect_error());
                }

                // Obtener todas las puntuaciones y números de partida del usuario logueado en orden descendente

                $sql = "SELECT puntuacion, partida FROM puntuacion WHERE idRelacion = $idUsuario AND idJuego = 2 ORDER BY puntuacion DESC";
                $resultado = mysqli_query($conexion, $sql);

                if ($resultado) {
                    if (mysqli_num_rows($resultado) > 0) {
                        // Mostrar las puntuaciones y números de partida en HTML
                        echo '<div class="col-md-4 mb-5 d-flex flex-column">';
                        echo '<div class="contenedorresultados">';
                        echo '<h1 class="text-center">Historial de Peliculas</h1>';
                        echo '<div id="results">';
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $puntuacion = $row["puntuacion"];
                            $numeroPartida = $row["partida"];

                            echo "<div class='resultado'>";

                            if (isset($_SESSION['image_url'])) {
                                $image_url = $_SESSION['image_url'];
                                echo "<div style='display: inline-flex; align-items: center;'>";
                                echo "<img style='margin-top: 20px; width:55px; height:55px; border-radius:150px;' src='$image_url' alt='' class='img-fluid'>";
                                echo "<h3 style='margin-left: 10px; margin-top: 20px; color: #2b8edf;'>Partida $numeroPartida - Puntuación: $puntuacion</h3>";
                                echo "</div>";
                            } else {
                                echo "<br><br><h3 style='color: #2b8edf';>Partida $numeroPartida - Puntuación: $puntuacion</h3>";
                            }

                            echo "</div>";
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo "<div class='col-md-3' style='display: inline-flex; align-items: center;'>";
                        echo '<h3>Todavia no hay puntuaciones registradas.</h3>';
                        echo '</div>';
                    }
                } else {
                    echo "<div style='display: inline-flex; align-items: center;'>";
                    echo "Error al obtener las puntuaciones: " . mysqli_error($conexion);
                    echo "</div>";
                }
                ?>


            </div>
        </div>

    </main>

    <footer class="text-center textofooter">

        <section class="p-4 bg-navbar">

        </section>

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

</body>


</html>