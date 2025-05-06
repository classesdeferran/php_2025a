<?php
// Llamar al fichero de la conexión
require_once 'conexion.php';
require_once 'traduccion_colores.php';

// print_r($_POST);
// echo "<br>";
// echo $_POST['usuario'];
// echo $_POST['color'];

$insert = "INSERT INTO colores(color, usuario) VALUES (?, ?);";
$insert_prepare = $conn->prepare($insert);
$insert_prepare->execute([$array_colors[$_POST['color']], $_POST['usuario']]);

$insert_prepare = null;
$conn = null;

header('location:index.php');