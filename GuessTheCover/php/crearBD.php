<?php
 $db_hostname = "localhost";
 $db_usuario = "root";
 $db_clave = "";
try {
    $pdo = new PDO('mysql:host=' . $db_hostname, $db_usuario, $db_clave);
    //UTF8
    $pdo->exec("set names utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlBD = file_get_contents("baseDatos.sql");
    $pdo->exec($sqlBD);
    echo ("La BD ha sido creada");
    $pdo = null;
} catch (PDOException $e) {
    // En este caso guardamos los errores en un archivo de errores log
    error_log($e->getMessage() . "## Fichero: " . $e->getFile() . "## Línea: " . $e->getLine() . "##Código: " . $e->getCode() . "##Instante: " . microtime() . PHP_EOL, 3, "logBD.txt");
    // guardamos en ·errores el error que queremos mostrar a los usuarios
    return "Ha habido un error <br>";
}


?>