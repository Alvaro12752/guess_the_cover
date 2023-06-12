<?php
session_start();

// Incluir archivo con la conexión a la base de datos
require_once "conexionBDRegistro.php";

// Obtener el idUsuario del usuario logueado desde la sesión
if (isset($_SESSION["idUsuario"])) {
    $idUsuario = $_SESSION["idUsuario"];
} else {
    echo "Error: No se encontró el idUsuario en la sesión.";
    exit;
}

// Llamamos a la función para crear una nueva entrada en la tabla "puntuacion"
nuevaPartida();

function nuevaPartida() {
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

    // Verificar si el usuario ya tiene una entrada en la tabla de puntuación
    $sql = "SELECT * FROM puntuacion WHERE idUsuario = $idUsuario AND idJuego = 1";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {
            // El usuario ya tiene una entrada, obtener el número de partida actual
            $row = mysqli_fetch_assoc($resultado);
            $partidaActual = $row["partida"];
            $nuevaPartida = $partidaActual + 1;

            // Insertar una nueva entrada con el número de partida incrementado y puntuación inicial de 1
            $sql = "INSERT INTO puntuacion (partida, idUsuario, puntuacion, idJuego) VALUES ($nuevaPartida, $idUsuario, 1, 1)";
            $resultado = mysqli_query($conexion, $sql);

            if ($resultado) {
                echo "La puntuación ha sido insertada exitosamente";
            } else {
                echo "Error al insertar la puntuación: " . mysqli_error($conexion);
            }
        } else {
            // El usuario no tiene una entrada, insertar una nueva entrada con partida 1 y puntuación inicial de 1
            $sql = "INSERT INTO puntuacion (partida, idUsuario, puntuacion, idJuego) VALUES (1, $idUsuario, 1, 1)";
            $resultado = mysqli_query($conexion, $sql);

            if ($resultado) {
                echo "La puntuación ha sido insertada exitosamente";
            } else {
                echo "Error al insertar la puntuación: " . mysqli_error($conexion);
            }
        }
    } else {
        echo "Error al obtener la información de puntuación del usuario: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}

// Llamamos a la función para crear una nueva partida
// nuevaPartida();
?>
