<?php include "header.php" ?>
<body>
    <h1>Crear Cuenta</h1>

    <?php if (isset($_GET['error'])): ?>
        <p class="res eliminado">Ocurrió un error. El usuario ya existe o faltan datos.</p>
    <?php endif; ?>

    <main>
        <form class="form" action="guardar_usuario.php" method="POST">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" required>

            <button class="btn-submit" type="submit">Registrarse</button>
            <p style="margin-top: 15px;"><a href="login.php">¿Ya tenés cuenta? Iniciá sesión</a></p>
        </form>
    </main>
</body>
</html>