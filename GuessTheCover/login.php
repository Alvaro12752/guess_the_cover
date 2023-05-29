<?php
session_start();

// Obtener los valores de usuario y contraseña del formulario de inicio de sesión
if (isset($_POST['submit'])) {
    $username = $_POST['usuario'];
    $contrasena = $_POST['password'];
    $contrasena = md5($contrasena);

    // Conectar a la base de datos
    $servername = "localhost";
    $db_username = "root";
    $db_password = '';
    $db_name = "guess_the_cover";
    $conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

    // Verificar si la conexión fue exitosa
    if (!$conn) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Consultar la base de datos para obtener los datos de usuario correspondientes al nombre de usuario ingresado
    $sql = "SELECT * FROM usuario  WHERE usuario='$username' and contraseña='$contrasena'";
    $result = mysqli_query($conn, $sql);

    // Verificar si se encontró un usuario con el nombre de usuario ingresado
    if (mysqli_num_rows($result) == 1) {
        // Obtener los datos del usuario de la consulta
        $row = mysqli_fetch_assoc($result);

        // Guardar el nombre de usuario en una variable
        $nombreUsuario = $row['usuario'];

        // Guardar el idUsuario en una variable
        $idUsuario = $row['idUsuario'];

        // Guardar el nombre de usuario en la sesión
        $_SESSION['username'] = $nombreUsuario;

        // Guardar el idUsuario en la sesión
        $_SESSION['idUsuario'] = $idUsuario;

        // Guardar el idUsuario en la sesión
        $_SESSION['rol'] = $rol;

        // Redirigir al usuario a la página de inicio
        header("Location: perfil.php");
        exit();
    } else {
        // Mostrar un mensaje de error si el nombre de usuario no se encontró en la base de datos
        $error = "Nombre de usuario no encontrado";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}

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



         <main class="row py-5">
             <div class="pt-4 col d-flex d-none d-sm-none d-md-flex justify-content-center">
                 <div class=" text-center">
                     <h1>GUESS <br>THE <br> COVER</h1>
                     <img src="logo/gtc1.png" class=" logo" alt="Logo">
                 </div>
             </div>
             <div class=" margtop col d-flex justify-content-center">
                 <div class=" justify-content-center align-items-center">
                     <form action="login.php" method="post" id="loginregistro" class="px-4 py-3 card1 ">
                         <div class="text-bold">
                             <h2 class="w-100 d-flex justify-content-center">
                                 INICIAR SESION
                             </h2>
                         </div>
                         <div class="inputGroup">
                             <input type="text" name="usuario" required="" id="usuario">
                             <label for="usuario">Usuario</label>
                         </div>

                         <div class="inputGroup">
                             <input type="password" name="password" id="pass" required>
                             <label for="pass">Contrasena</label>
                         </div>

                         <div class="d-flex justify-content-center">
                             <input class="rounded border-0 botonlogin text-dark" type="submit" name="submit" id="boton" value="Iniciar">
                         </div>

                         <div class="d-flex d-flex justify-content-center overflow-auto mt-4">
                             <a class="text-none link border-0 rounded" href="cambiarContraseña.html">
                                 Has olvidado la contrasena
                             </a>

                         </div>
                         <div class="text-center text-bold">
                             <p>
                                 <hr>o
                                 <hr>
                             </p>
                         </div>
                         <div class="d-flex d-flex justify-content-center overflow-auto">
                             <a class="text-none  border-0 rounded link" href="registro.php">
                                 Crear cuenta nueva
                             </a>

                         </div>
                     </form>
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