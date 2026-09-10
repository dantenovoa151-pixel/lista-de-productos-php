<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "tiendados";

try {

    $conexion = new PDO(
        "mysql:host=$servidor;dbname=$basededatos;charset=utf8",
        $usuario,
        $clave
    );

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Error de conexion: " . $e->getMessage());

}

?>