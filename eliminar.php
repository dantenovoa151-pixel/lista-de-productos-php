<?php

require "conexion.php";

if (!isset($_GET["id"])) {
    die("No se recibió el ID");
}

$id = $_GET["id"];

$consulta = $conexion->prepare("DELETE FROM productos WHERE id = :id");

$consulta->execute([
    ":id" => $id
]);

if ($consulta->rowCount() > 0) {
    header("Location: index.php?res=eliminado");
    exit;
}
?>