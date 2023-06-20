<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>GUESS THE COVER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
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
    <div>
        <main class="row py-5 justify-content-center">
            <div class="col-md-6 py-3 d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <h2>Cambio de Contrasena</h2>
                    <form action="" id="contraseñaregistro" method="POST">
                        <input type="hidden" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                        <div class="inputGroupContrasena" style="margin-top:40px;">
                            <label for="codigo">Código:</label><br>
                            <input type="text" name="codigo" required>
                        </div>
                        <div class="inputGroupContrasena"><br>
                            <label for="nombreUsuario"> Introduce tu usuario:</label><br>
                            <input type="text" name="nombreUsuario" required>
                        </div>
                        <div class="inputGroupContrasena"><br>
                            <label for="nuevaContraseña"> Nueva contrasena:</label><br>
                            <input type="password" name="nuevaContraseña" required>
                        </div>
                        <div class="inputGroupContrasena"><br>
                            <label for="confirmarContraseña">Confirmar Contrasena:</label>
                            <input type="password" name="confirmarContraseña" required>
                        </div>

                        <div class="mt-5">
                            <input type="submit" class="botoncontraseña" name="submit" value="Cambiar Contrasena">
                        </div>
                    </form>
                </div>
        </main>

        <?php


        // Verificar si se ha enviado el formulario
        if (isset($_POST['submit'])) {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
            $nombreUsuario = isset($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : '';
            $nuevaContraseña = isset($_POST['nuevaContraseña']) ? $_POST['nuevaContraseña'] : '';
            $confirmarContraseña = isset($_POST['confirmarContraseña']) ? $_POST['confirmarContraseña'] : '';

            // Verificar que las contraseñas coincidan
            if ($nuevaContraseña != $confirmarContraseña) {
                echo "Las contraseñas no coinciden";
                exit();
            }

            // Obtener el código generado de la sesión
            if (isset($_SESSION['codigoGenerado'])) {
                $codigoGenerado = $_SESSION['codigoGenerado'];

                // Verificar si el código de verificación es correcto
                if ($codigo != $codigoGenerado) {
                    echo '<span style="color: red; font-size:25px; display: block; text-align: center;">El código de verificación es incorrecto</span>';
                    exit();
                }

                // Restablecer la variable de sesión
                unset($_SESSION['codigoGenerado']);
            } else {
                echo '<span style="color: red; font-size:25px; display: block; text-align: center;">No se encontró el código generado en la sesión</span>';
                exit();
            }

            // Conexión a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = '';
            $database = "guess_the_cover";

            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $database);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error en la conexión a la base de datos: " . $conn->connect_error);
            }

            // Generar el hash MD5 de la contraseña
            $hashedPassword = md5($nuevaContraseña);

            // Actualizar la contraseña del usuario
            $sql = "UPDATE usuario SET contraseña = '$hashedPassword' WHERE usuario = '$nombreUsuario'";
            if ($conn->query($sql) === TRUE) {
                echo '<a href="login.php" style="color: greenyellow; display: block; text-align: center;">Ir a la página de inicio de sesión</a>';
            } else {
                echo "Error al actualizar la contraseña: " . $conn->error;
            }

            // Cerrar la conexión a la base de datos
            $conn->close();
        }
        ?>
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