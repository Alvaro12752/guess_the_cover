 <?php

    class Registro
    {
        //private $pdo;

        public function validar_nombre($nombre)
        {
            $patron = "/^[a-zA-Z]{3,10}$/"; // Expresión regular que solo permite letras y una longitud entre 3 y 10 caracteres
            return preg_match($patron, $nombre);
        }

        public function validar_usuario($usuario)
        {
            $patron = "/^[a-zA-Z]{3,10}$/"; // Expresión regular que solo permite letras y una longitud entre 3 y 10 caracteres
            return preg_match($patron, $usuario);
        }

        public function validar_contrasena($contrasena)
        {
            $patron = "/^[a-zA-Z0-9!@#$%^&*()_+-=]{5,10}$/"; // Expresión regular que solo permite letras, números y símbolos y una longitud entre 5 y 10 caracteres
            return preg_match($patron, $contrasena);
        }

        public function insertar_usuario($nombre, $usuario, $email, $contrasena)
        {

            $host = 'localhost';
            $dbname = 'guess_the_cover';
            $username = 'root';
            $password = '';

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $contrasena = md5($contrasena);
                $rol = 1; // Por ejemplo, rol de usuario normal

                // Sentencia SQL para insertar un nuevo usuario en la tabla 'usuario'
                $sql = "INSERT INTO usuario (nombre, usuario, email, contraseña, rol) VALUES (?, ?, ?, ?, ?)";

                // Preparar la sentencia SQL para ejecutarla con PDO
                $stmt = $pdo->prepare($sql);

                // Array de parámetros para la consulta preparada
                $params = array($nombre, $usuario, $email, $contrasena, $rol);


                // Ejecutar la sentencia SQL con los parámetros
                if ($stmt->execute($params)) {
                    // Obtener el ID del usuario insertado
                    // $idUsuario = $pdo->lastInsertId();

                    // // Insertar el rol 1 por defecto en la tabla de roles para el nuevo usuario
                    // $sqlRol = "INSERT INTO roles (idRelacion, rol) VALUES (?, ?)";
                    // $stmtRol = $pdo->prepare($sqlRol);
                    // $paramsRol = array($idUsuario, 1);
                    // $stmtRol->execute($paramsRol);

                    return "si va";
                } else {
                    return "no va";
                }
            } catch (PDOException $e) {
                die("Error al conectarse a la base de datos: " . $e->getMessage());
            }
        }
    }

    function nuevaPartidaJuegos()
    {
        // Obtener el idUsuario del usuario logueado desde la sesión
        if (isset($_SESSION["idUsuario"])) {
            $idUsuario = $_SESSION["idUsuario"];
        } else {
            echo "Error: No se encontró el idUsuario en la sesión.";
            exit;
        }

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

        // Insertar nueva entrada en la tabla "puntuacion"
        $sql = "INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES ($idUsuario, 0,1)";
        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo "Se ha creado una nueva entrada en la tabla 'puntuacion'";
        } else {
            echo "Error al crear una nueva entrada en la tabla 'puntuacion': " . mysqli_error($conexion);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    }
    
    function nuevaPartidapeliculas()
    {
        // Obtener el idUsuario del usuario logueado desde la sesión
        if (isset($_SESSION["idUsuario"])) {
            $idUsuario = $_SESSION["idUsuario"];
        } else {
            echo "Error: No se encontró el idUsuario en la sesión.";
            exit;
        }

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

        // Insertar nueva entrada en la tabla "puntuacion"
        $sql = "INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES ($idUsuario, 0,2)";
        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo "Se ha creado una nueva entrada en la tabla 'puntuacion'";
        } else {
            echo "Error al crear una nueva entrada en la tabla 'puntuacion': " . mysqli_error($conexion);
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    }
    ?>