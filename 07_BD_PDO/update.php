<?php
// Llamar al fichero de la conexión
require_once 'conexion.php';
require_once 'traduccion_colores.php';

// print_r($_POST);

$update = "update colores set color = ?, usuario = ? where id_color = ?;";
$update_prepare = $conn->prepare($update);
$update_prepare->execute([$array_colors[$_POST['color']], $_POST['usuario'], $_POST['id']]);

$update_prepare = null;
$conn = null;

header('location:index.php');