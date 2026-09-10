<?php
require "conexion.php";
$resultado = $conexion->query('SELECT * FROM productos');

$res = $_GET["res"] ?? "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Crud PHP</title>
</head>
<body>
    <h1>Clase 15 - CRUD con PHP</h1>
    <?php if($res == "agregado"): ?>
        <p class="res agregado">El producto se agregó correctamente</p>
    <?php elseif($res == "editado"): ?>
        <p class="res editado">El producto se editó correctamente</p>
    <?php elseif($res == "eliminado"): ?>
        <p class="res eliminado">El producto se eliminó correctamente</p>
    <?php elseif($res == "error"): ?>
        <p class="res error"> Ocurrió un error</p>
    <?php endif; ?>
    <?php if($res == "ok"): ?>
        <p class="res">El producto se actualizó correctamente</p>
    <?php endif; ?>
    <main>
    <h2>Lista de productos</h2>
    <section class="productos">
    <?php foreach ($resultado as $producto): ?>
        <article class="producto">
            <h3><?= $producto['nombre']; ?></h3>
            <p>Stock disponible: <?= $producto['stock']; ?></p>
            <p>$<?= $producto['precio']; ?></p>
            <a href="editar.php?id=<?= $producto['id']; ?>">Editar</a>
            <a href="eliminar.php?id=<?= $producto['id']; ?>">Eliminar</a>
        </article>
    <?php endforeach; ?>
    </section>
    <section>
        <h2>Agregar producto</h2>
        <form class="form" action="guardar.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" required>
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" step="0.01" required>
            <button class="btn-submit" type="submit">Agregar</button>
        </form>
    </section>
</main>
</body>
</html>