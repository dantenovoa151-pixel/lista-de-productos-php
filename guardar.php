<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

require "conexion.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $stock = (int)$_POST['stock'];
    $precio = (float)$_POST['precio'];

    
    if (empty($nombre) || $stock < 0 || $precio <= 0) {
        die("Todos los campos son obligatorios y deben ser válidos.");
    }

    
    $consulta = $pdo->prepare("INSERT INTO productos (nombre, stock, precio) VALUES (:nombre, :stock, :precio)");
    $consulta->execute([
        ':nombre' => $nombre,
        ':stock'  => $stock,
        ':precio' => $precio
    ]);

    
    header("Location: index.php?res=agregado");
    exit;
} else {
    header("Location: agregar.php");
    exit;
}
?>