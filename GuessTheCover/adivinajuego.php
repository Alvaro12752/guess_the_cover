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

// Llamamos a la función para iniciar una nueva partida o obtener el registro existente
obtenerPartida();

function obtenerPartida() {
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

    // Iniciar una nueva partida para el usuario con puntuación inicial de 0
    $sql = "INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES ($idUsuario, 0, 1)";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Se ha iniciado una nueva partida";
        // Guardar la puntuación inicial en la variable de sesión
        $_SESSION["puntuacion"] = 0;
    } else {
        echo "Error al iniciar una nueva partida: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
