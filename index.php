<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

require "conexion.php";
$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll();
?>

<?php include "header.php" ?>
<body>
    <header style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px;">
        <p>Hola, <strong><?= $_SESSION['usuario']; ?></strong> (<em><?= $_SESSION['rol']; ?></em>)</p>
        <a href="logout.php" style="color: red; font-weight: bold;">Cerrar Sesión</a>
    </header>

    <h1>Lista de Productos</h1>

    <?php if (isset($_GET['res']) && $_GET['res'] == 'agregado'): ?>
        <p class="res agregado">Producto agregado correctamente.</p>
    <?php endif; ?>

    <?php if (isset($_GET['res']) && $_GET['res'] == 'editado'): ?>
        <p class="res agregado">Producto actualizado correctamente.</p>
    <?php endif; ?>

    <?php if (isset($_GET['res']) && $_GET['res'] == 'eliminado'): ?>
        <p class="res eliminado">Producto eliminado correctamente.</p>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'sin_permiso'): ?>
        <p class="res eliminado">Error: Solo los administradores pueden eliminar productos.</p>
    <?php endif; ?>

    <main>
        <p><a class="btn-submit" href="agregar.php">+ Agregar Producto</a></p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= $producto['id']; ?></td>
                        <td><?= $producto['nombre']; ?></td>
                        <td><?= $producto['stock']; ?></td>
                        <td>$<?= $producto['precio']; ?></td>
                        <td>
                            <a class="btn-submit" href="editar.php?id=<?= $producto['id']; ?>">Editar</a>
                            
                            <?php if ($_SESSION['rol'] === 'admin'): ?>
                                <a class="btn-submit" style="background-color: red;" href="eliminar.php?id=<?= $producto['id']; ?>" onclick="return confirm('¿Seguro que querés eliminar?');">Eliminar</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>