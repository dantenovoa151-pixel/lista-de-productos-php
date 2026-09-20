<?php

$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "tiendados";

try {

    $pdo = new PDO(
        "mysql:host=$servidor;dbname=$basededatos;charset=utf8",
        $usuario,
        $clave
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Error de conexion: " . $e->getMessage());

}

?>