<?php

session_start();
require_once 'pdo_bind_connection.php';

// Para mostrar imágenes de manera aleatoria
$num_random = random_int(0, 4);

$imagenes = [
    [
        'src' => 'img/espiral.jpg',
        'alt' => 'espiral de colores'
    ],
    [
        'src' => 'img/iris.jpg',
        'alt' => 'degradado de colores'
    ],
    [
        'src' => 'img/lapices.jpg',
        'alt' => 'lápices de colores'
    ],
    [
        'src' => 'img/manos.webp',
        'alt' => 'manos pintadas de colores'
    ],
    [
        'src' => 'img/pared.jpg',
        'alt' => 'pared pintada con colores vivos'
    ]
    ];

include_once 'modulos/idioma.php';
// echo $idioma;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once 'modulos/etiquetas_meta.php'; ?>
    <link rel="stylesheet" href="css/styles.css">
    <title>Colores</title>
</head>

<body>

    <?php include_once 'modulos/header.php'; ?>

    <main class="index-main">

        <section>
            <img src="<?= $imagenes[$num_random]['src']?>" alt="<?= $imagenes[$num_random]['alt']?>" class="img-colores">
        </section>
        <section>
            <?php

            $formulario = $_GET['formulario'] ?? 'login';
            switch ($formulario) {
                case 'login':
                    include_once 'modulos/form_login.php';
                    break;
                case 'crear-cuenta':
                    include_once 'modulos/form_crear_cuenta.php';
                    break;
                case 'reset':
                    include_once 'modulos/form_reset.php';
                    break;
                case 'revisar-correo':
                    include_once 'modulos/revisar_cuenta_correo.php';
                    break;
                default:
                    include_once 'modulos/form_login.php';
                    break;
            }


            ?>
        </section>
    </main>


</body>
<script src="js/index.js"></script>
</html>
<?php
