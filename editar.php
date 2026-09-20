<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

require "conexion.php";

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = $_GET["id"];

$consulta = $pdo->prepare("SELECT * FROM productos WHERE id = :id");
$consulta->execute([':id' => $id]);
$producto = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    header("Location: index.php");
    exit;
}

include "header.php";
?>
<body>
    <?php include "nav.php"; ?>
    <h2>Modificar producto</h2>
    <form class="form" action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?= $producto["id"]; ?>">
        
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($producto["nombre"]); ?>" required>
        
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" value="<?= $producto["stock"]; ?>" required>
        
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" step="0.01" value="<?= $producto["precio"]; ?>" required>
        
        <button class="btn-submit" type="submit">Actualizar</button>
    </form>
</body>
</html>