<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['rol'])) {
    // Obtener el rol del usuario logueado
    $rol = $_SESSION['rol'];
    // Devolver el rol del usuario en formato JSON
    echo json_encode(['rol' => $rol]);
   
}
