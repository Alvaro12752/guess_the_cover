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

    <main class="row py-5">
        <div class="col-md-6 d-flex justify-content-center align-items-center text-center">
            <div>
                <h1>GUESS <br> THE <br> COVER</h1>
                <img src="logo/gtc1.png" class="logo" alt="Logo">
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <form method="POST" action="" id="loginregistro" class="w-90 px-4 py-2">
                <div>
                    <h2>Registro</h2>
                </div>
                <div>
                    <div class="me-3">
                        <div class="inputGroup mt-2">
                            <label for="nombre">nombre</label><br>
                            <input name="nombre" type="text" required id="nombre" class="w-50" minlength="3" maxlength="20" autocomplete="off" placeholder="Nombre">
                        </div>
                        <?php

                        ?>
                    </div>

                    <div class="me-3">
                        <div class="inputGroup mt-2">
                            <label for="usuario">Usuario</label><br>
                            <input type="text" name="usuario" required="" id="usuario" class="w-50" minlength="2" maxlength="20" autocomplete="off" placeholder="Nombre de Usuario">

                        </div>

                        <span class="text-danger" id="errorUsuario"></span>
                    </div>
                </div>
                <div>
                    <div class="inputGroup mt-2">
                        <label for="nombre">Email</label><br>
                        <input type="email" name="email" id="email" class="w-50" placeholder="Email" required>
                    </div>

                    <span class="text-danger" id="errorEmail"></span>
                </div>
                <div>
                    <div class="inputGroup mt-2">
                        <label for="nombre">Contrasena</label><br>

                        <input type="password" name="contraseña" id="contraseña" class="w-50" placeholder="Contrasena">

                    </div>

                    <span class="text-danger" id="contraseñaErr"></span>
                </div>
                <div>
                    <div class="inputGroup mt-2">
                        <label for="nombre">Fecha de Nacimiento</label><br>
                        <input type="date" name="date" id="date" class="w-50" required min="1900-01-01" max="2005-01-10" placeholder="nacimiento">
                    </div>
                    <span class="text-danger" id="errorDate"></span>
                </div>
                <div class="d-flex justify-content-center ">
                    <input type="submit" name="bAceptar" value="Registrarse" class=" botonlogin rounded border-0 m-4 px-3 py-2 w-50" id="btn-register">
                </div>
                <div class="d-flex justify-content-center ">
                    <a href="login.php" class=" botonlogin rounded border-0 m-4 px-3 py-2 w-40" style="color: black; ">Iniciar sesión</a>
                </div>

                <?php
                //   $host = 'localhost';
                //   $dbname = 'guess_the_cover';
                //   $username = 'root';
                //   $password = '';


                //   try {
                //       $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                //       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //   } catch (PDOException $e) {
                //       die("Error al conectarse a la base de datos: " . $e->getMessage());
                //   }
                if (isset($_POST['bAceptar'])) {
                    $nombre = $_POST['nombre'];
                    $usuario = $_POST['usuario'];
                    $email = $_POST['email'];
                    $contrasena = $_POST['contraseña'];

                    require_once 'conexionBDRegistro.php';

                    $registro = new Registro();

                    $datosValidos = true;
                    if (!$registro->validar_nombre($nombre)) {
                        echo "<p>El nombre no es válido. Debe contener solo letras y tener una longitud entre 3 y 10 caracteres.</p>";
                        $datosValidos = false;
                    }
                    if (!$registro->validar_usuario($usuario)) {
                        echo "<p class='pincorrecto'>El usuario no es válido. Debe contener solo letras y tener una longitud entre 3 y 10 caracteres.</p>";
                        $datosValidos = false;
                    }
                    if (!$registro->validar_correo($email)) {
                        echo "<p class='pincorrecto'>El correo no es valido.</p>";
                        $datosValidos = false;
                    }
                    if (!$registro->validar_contrasena($contrasena)) {
                        echo "<p class='pincorrecto'>La contraseña no es válida. Debe contener letras, números y símbolos y tener una longitud entre 5 y 10 caracteres.</p>";
                        $datosValidos = false;
                    }
                    if ($registro->usuario_existe($usuario)) {
                        echo "<p class='pincorrecto'>El nombre de usuario ya está registrado.</p>";
                        $datosValidos = false;
                    }

                    if ($registro->correo_existe($email)) {
                        echo "<p class='pincorrecto'>El correo electrónico ya está registrado.</p>";
                        $datosValidos = false;
                    }

                    if ($datosValidos) {
                        $registro->insertar_usuario($nombre, $usuario, $email, $contrasena);
                        echo "<p class='pcorrecto'>Registro realizado. Ya puedes iniciar sesión.</p>";
                    }
                }
                ?>
                <?php
                // function validar_nombre_usuario($usuario)
                // {
                //     $host = 'localhost';
                //     $dbname = 'guess_the_cover';
                //     $username = 'root';
                //     $password = '';

                //     try {
                //         $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                //         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //         // Sentencia SQL para buscar un usuario con el nombre de usuario proporcionado
                //         $sql = "SELECT COUNT(*) FROM usuario WHERE usuario = ?";

                //         // Preparar la sentencia SQL para ejecutarla con PDO
                //         $stmt = $pdo->prepare($sql);

                //         // Asignar el valor del parámetro
                //         $stmt->bindValue(1, $usuario);

                //         // Ejecutar la consulta
                //         $stmt->execute();

                //         // Obtener el resultado
                //         $count = $stmt->fetchColumn();

                //         // Si el resultado es mayor a 0, significa que el nombre de usuario ya existe
                //         if ($count > 0) {
                //             return false;
                //         } else {
                //             return true;
                //         }
                //     } catch (PDOException $e) {
                //         die("Error al conectarse a la base de datos: " . $e->getMessage());
                //     }
                // }
                // 
                ?>
            </form>



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