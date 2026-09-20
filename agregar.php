<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include "header.php";
?>
<body>
    <?php include "nav.php"; ?>
    <h2>Agregar Nuevo Producto</h2>
    <form class="form" action="guardar.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" required>

        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" step="0.01" required>

        <button class="btn-submit" type="submit">Guardar Producto</button>
    </form>
</body>
</html>