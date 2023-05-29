<?php
session_start();

// Comprueba si el rol del usuario logueado es igual a 2
function verificarRolUsuario() {
    // Verifica si la sesión del usuario está iniciada y si tiene el rol almacenado en ella
    if (isset($_SESSION['rol'])) {
        // Comprueba si el rol del usuario es igual a 2
        if ($_SESSION['rol'] === 2) {
            return true;
        }
    }

    return false;
}

// Verifica si el usuario logueado tiene el rol 2
$tieneRol2 = verificarRolUsuario();

// Devuelve el resultado como una respuesta JSON
header('Content-Type: application/json');
echo json_encode(['tieneRol2' => $tieneRol2]);
?>
