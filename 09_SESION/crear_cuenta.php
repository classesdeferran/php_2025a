<?php

session_start();
require_once 'pdo_bind_connection.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once 'etiquetas_meta.php'; ?>
    <title>Document</title>
</head>

<body>
    <main>
        <form action="insert_user.php" method="post">
            <fieldset>
                <h1>Crear cuenta</h1>
                <div>
                    <label for="usuario">Nombre:</label>
                    <input type="text" name="usuario" id="usuario">
                </div>
                <div>
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <label for="password2">Repite la contraseña:</label>
                    <input type="password" name="password2" id="password2">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" name="telefono" id="telefono">
                </div>
                <div class="error_cuenta">
                    <?php if ($_SESSION['error_cuenta']): ?>
                        <p>Error en los datos</p>
                    <?php endif; ?>
                </div>
                <div class="botones">
                    <button type="submit">Enviar</button>
                    <button type="reset">Borrar</button>
                </div>

            </fieldset>





        </form>
    </main>

</body>

</html>

<?php

$_SESSION['error_cuenta'] = false;
