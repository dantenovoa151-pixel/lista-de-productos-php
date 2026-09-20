<?php
session_start();
include "conexion.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    if (!empty($usuario) && !empty($password)) {
        try {
            
            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE usuario = :usuario");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            
            if ($user && (password_verify($password, $user['contrasena']) || $password === $user['contrasena'])) {
                $_SESSION['usuario'] = $user['usuario'];
                $_SESSION['rol'] = $user['rol'];
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error'] = "Usuario o contraseña incorrectos.";
                header("Location: login.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error en la base de datos: " . $e->getMessage();
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Por favor, completa todos los campos.";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>