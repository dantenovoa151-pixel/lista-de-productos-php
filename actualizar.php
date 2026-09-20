<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = trim($_POST['nombre']);
    $stock = (int)$_POST['stock'];
    $precio = (float)$_POST['precio'];

    $stmt = $pdo->prepare("UPDATE productos SET nombre = :nombre, stock = :stock, precio = :precio WHERE id = :id");
    $stmt->execute([
        ':nombre' => $nombre,
        ':stock'  => $stock,
        ':precio' => $precio,
        ':id'     => $id
    ]);

    header("Location: index.php?res=editado");
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>