<?php
session_start();
$_SESSION ['session-token'] = bin2hex(random_bytes(32));

// Formas de llamar a un fichero en PHP
// include 'nombre_fichero'; // no detiene el script
// require 'nombre_fichero'; // sí detiene el script
// include_once 'nombre_fichero'; // es llamado una única vez
// require_once 'nombre_fichero'; // es llamado una única vez

// Llamar al fichero de la conexión
require_once 'conexion.php';
require_once 'traduccion_colores.php';

// echo "<br> Soy index.php";

// Definir la instrucción
$select = "SELECT * FROM colores;";

// Preparación
$preparacion = $conn->prepare($select);
// Ejecución
$preparacion->execute();

// Obtener los valores seleccionados
$array_filas = $preparacion->fetchAll();

//  Color por defecto
$color = "white";
// print_r($array_filas);


if ($_GET) {


    foreach ($array_colors as $esp => $eng) {
        if ($_GET['color'] == $eng) {
            $_GET['color'] = $esp;
            break;
        }
    }
    
}

// Cerrar la conexión
$conn = null;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Nuestros colores preferidos</h1>
    </header>
    <main>
        <section>
            <h2>Nuestros usuarios</h2>
            <?php foreach ($array_filas as $fila) : ?>
                
                <?php 
                $color = "white";
                $arrayLetrasOscuras = ["white", "yellow", "pink", "gray", "grey"];
                if (in_array($fila['color'], $arrayLetrasOscuras)) {
                    $color = "black";
                }
                
                // if ($fila['color'] == "white" || $fila['color'] == "yellow" || $fila['color'] == "pink" || $fila['color'] == "grey") {
                //     $color = "black";
                // } else {
                //     $color = "white";
                // }
                ?>
                <div class="items" style="background-color: <?= $fila['color'] ?>; color: <?= $color ?>;">
                    <p>
                        <?= htmlspecialchars($fila['usuario'], ENT_QUOTES, 'UTF-8')   ?>
                    </p>

                    <span>
                        <a href="index.php?id=<?= $fila['id_color']?>&user=<?= str_replace(" ", "%20", $fila['usuario']) ?>&color=<?=$fila['color'] ?>">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="delete.php?id=<?= $fila['id_color'] ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>


                    </span>
                </div>

            <?php endforeach ?>
        </section>
        <section>

            <?php if ($_GET) : ?>
                <!-- Formulario para la actualización  -->
                <h2>Modifica tus datos</h2>

                <form action="update.php" method="post" id="form_update">
                    <fieldset>
                        <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden>
                        <div>
                        <label for="usuario">Tu nombre : </label>
                        <input type="text" name="usuario" id="usuario" value="<?= $_GET['user'] ?>" >
                        </div>
                        <div>
                            <label for="color">Tu color : </label>
                            <input type="text" name="color" id="color" value="<?= $_GET['color'] ?>" >
                        </div>

                        <div>
                            <button type="submit">Enviar datos</button>
                            <a href="index.php?id=<?= $_GET['id'] ?>?>&user=%20&color=%20">
                            Limpiar formulario
                        </a>
                    
                            

                        </div>

                    </fieldset>
                </form>


            <?php else : ?>
                <!-- Formulario para la inserción de datos  -->
                <h2>Dinos tu color preferido</h2>

                <!-- <form action="insert.php" method="post"> -->
                    <form name="formInsert">
                    <fieldset>
                        <!-- Token de sesión -->
                <input type="hidden" name="session-token" value="<?= $_SESSION ['session-token'] ?>" >
                        <!-- HoneyPot -->
                         <input type="text" name="web" style="display:none">


                        <div>
                            <label for="usuario">Tu nombre : </label>
                            <input type="text" name="usuario" id="usuario">
                            <p id="errorUsuario"></p>
                        </div>
                        <div>
                            <label for="color">Tu color : </label>
                            <input type="text" name="color" id="color">
                            <p id="errorColor"></p>
                        </div>

                        <div>
                            <button type="submit">Enviar datos</button>
                            <button type="reset">Limpiar formulario</button>
                        </div>

                    </fieldset>


                </form>


            <?php endif; ?>






        </section>
    </main>
</body>

<script src="js/colores.js"></script>

</html>