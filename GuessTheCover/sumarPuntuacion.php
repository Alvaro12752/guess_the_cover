<?php
session_start();

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

// Obtener la puntuación actual del jugador desde la variable de sesión
$puntuacionActual = isset($_SESSION["puntuacion"]) ? $_SESSION["puntuacion"] : 0;

// Definir el incremento de la puntuación
$incremento = 1;

// Incrementar la puntuación actual en 1
$nuevaPuntuacion = $puntuacionActual + $incremento;

// Actualizar la puntuación en la base de datos
$sql = "UPDATE puntuacion SET puntuacion = $nuevaPuntuacion WHERE idRelacion = $idUsuario ORDER BY Partida DESC LIMIT 1";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo "Puntuación actualizada exitosamente";
    
    // Actualizar la puntuación en la variable de sesión
    $_SESSION["puntuacion"] = $nuevaPuntuacion;
} else {
    echo "Error al actualizar la puntuación: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
