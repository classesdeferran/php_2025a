<?php
error_reporting(0);
session_start();
$_SESSION ['session-token'] = bin2hex(random_bytes(64));

// Formas de llamar a un fichero en PHP
// include 'nombre_fichero'; // no detiene el script
// require 'nombre_fichero'; // sí detiene el script
// include_once 'nombre_fichero'; // es llamado una única vez
// require_once 'nombre_fichero'; // es llamado una única vez

// Llamar al fichero de la conexión
require_once '../pdo_bind_connection.php';
require_once 'traduccion_colores.php';

// echo "<br> Soy index.php";

// Definir la instrucción
$select = "SELECT * FROM colores where id_usuario = :id_usuario;";

// Preparación
$preparacion = $pdo->prepare($select);
$preparacion->bindParam(':id_usuario', $_SESSION['id_usuario'], PDO::PARAM_INT);
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
$pdo = null;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once '../modulos/etiquetas_meta.php'; ?>


    <title>Colores</title>

    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

 <?php include_once '../modulos/header.php'; ?>

    <main class="main-colores">
        <section >
            <h2>Nuestros amigos</h2>
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
                        <a href="index.php?formulario=update&id=<?= $fila['id_color']?>&user=<?= str_replace(" ", "%20", $fila['usuario']) ?>&color=<?=$fila['color'] ?>">
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
        <?php
            $formulario = $_GET['formulario'] ?? "insert";

            switch ($formulario) {
                case "insert":
                    include_once "../modulos/form_insert_colores.php";
                    break;
                case "update":
                    include_once "../modulos/form_update_colores.php";
                    break;
            }

        ?>
        </section>
    </main>
</body>

<script src="js/colores.js"></script>
<script src="../js/index.js"></script>

</html>
<?php

$_SESSION['error_sesion'] = false;