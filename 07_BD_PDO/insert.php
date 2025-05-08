<?php
// Llamar al fichero de la conexión
require_once 'conexion.php';
require_once 'traduccion_colores.php';

// Token de sesion 
session_start();
if (!hash_equals($_SESSION['session-token'], $_POST['session-token'])) {
    die("Token inválido");
}
// HoneyPot
if (!empty($_POST['web'])) {
    die("bot detectado");
}


// print_r($_POST);

// echo $_POST['usuario'];
// echo "<br>";
// echo $_POST['color'];

$user = trim($_POST['usuario']);
$color = trim($_POST['color']);
echo $user;
echo "<br>";
echo $color;


if (empty($user) || empty($color)) {
    header('location:index.php');
    exit();
}

$insert = "INSERT INTO colores(color, usuario) VALUES (?, ?);";
$insert_prepare = $conn->prepare($insert);
$insert_prepare->execute([$array_colors[$color], $user]);

$insert_prepare = null;
$conn = null;

header('location:index.php');