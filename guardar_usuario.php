<?php
require "conexion.php"; 

if ($_POST) {
    $user = $_POST['usuario'];
    $pass = $_POST['contrasena'];
    $rol = "cliente";

    if (empty($user) || empty($pass)) {
        header("Location: registro.php?error=1");
        exit;
    }

    $pass_hashed = password_hash($pass, PASSWORD_BCRYPT);

    try {
        $stmt = $pdo->prepare("INSERT INTO usuario (usuario, contrasena, rol) VALUES (?, ?, ?)");
        $stmt->execute([$user, $pass_hashed, $rol]);

        header("Location: login.php?res=registrado");
        exit;
    } catch (PDOException $e) {
        header("Location: registro.php?error=1");
        exit;
    }
}
?>