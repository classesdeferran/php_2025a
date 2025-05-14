<?php
error_reporting(0);
session_start();
require_once 'pdo_bind_connection.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once 'etiquetas_meta.php'; ?>
    <title>Colores</title>
</head>
<body>

    <?php include_once 'modulos/header.php'; ?>

    <main class="index-main">
    <dialog id="login" open closedby="any">
                <form action="login.php" method="post">
            <fieldset>
                <h1>Iniciar sesión</h1>
                <div>
                    <label for="usuario">Nombre:</label>
                    <input type="text" name="usuario" id="usuario">
                </div>
                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <a href="crear_cuenta.php">Crear cuenta</a>
                </div>
                 
                <div class="error_cuenta">
                    <?php if ($_SESSION['error_cuenta']): ?>
                        <p>Error en los datos</p>
                    <?php endif; ?>
                </div>
                <div class="error_cuenta">
                    <?php if ($_SESSION['user_inexistente']): ?>
                        <p>Usuario o contraseña incorrectos</p>
                    <?php endif; ?>
                </div>
                <div class="botones">
                    <button type="submit">Enviar</button>
                    <button type="reset">Borrar</button>
                </div>
                

            </fieldset>
        </form>
    </dialog>
    </main>


</body>
</html>
<?php
$_SESSION['error_cuenta'] = false;
$_SESSION['user_inexistente'] = false;