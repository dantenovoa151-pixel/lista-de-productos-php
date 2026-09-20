<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}


if ($_SESSION['rol'] !== 'admin') {
    header("Location: index.php?error=sin_permiso");
    exit;
}

require "conexion.php";

if (!isset($_GET["id"])) {
    die("No se recibió el ID");
}

$id = $_GET["id"];

$consulta = $pdo->prepare("DELETE FROM productos WHERE id = :id");
$consulta->execute([":id" => $id]);

header("Location: index.php?res=eliminado");
exit;
?>