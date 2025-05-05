<?php

// Formas de llamar a un fichero en PHP
// include 'nombre_fichero'; // no detiene el script
// require 'nombre_fichero'; // sí detiene el script
// include_once 'nombre_fichero'; // es llamado una única vez
// require_once 'nombre_fichero'; // es llamado una única vez

// Llamar al fichero de la conexión
require_once 'conexion.php';

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

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
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

                <?php if ($fila['color'] == "white" || $fila['color'] == "yellow" || $fila['color'] == "pink" || $fila['color'] == "grey") {
                    $color = "black";
                } else {
                    $color = "white";
                }
                ?>
                <div style="background-color: <?= $fila['color'] ?>; color: <?= $color ?>;">
                    <p>
                        <?= $fila['usuario'] ?>
                    </p>

                </div>

            <?php endforeach ?>
        </section>
        <section>
            <h2>Dinos tu color preferido</h2>

            <form action="insert.php" method="post">
                <fieldset>
                    <div>
                        <label for="usuario">Tu nombre : </label>
                        <input type="text" name="usuario" id="usuario">


                    </div>
                    <div>
                        <label for="color">Tu color : </label>
                        <input type="text" name="color" id="color">
                    </div>

                    <div>
                        <button type="submit">Enviar datos</button>
                        <button type="reset">Limpiar formulario</button>
                    </div>

                </fieldset>


            </form>



        </section>
    </main>
</body>

</html>