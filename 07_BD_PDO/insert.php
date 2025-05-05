<?php
// Llamar al fichero de la conexión
require_once 'conexion.php';


// print_r($_POST);
// echo "<br>";
// echo $_POST['usuario'];
// echo $_POST['color'];

$array_colors = [
    "rojo" => "red", 
    "azul" => "blue", 
    "verde" => "green", 
    "amarillo" => "yellow", 
    "blanco" => "white", 
    "rosa" => "pink",
    "negro" => "black"
];



$insert = "INSERT INTO colores(color, usuario) VALUES (?, ?);";
$insert_prepare = $conn->prepare($insert);
$insert_prepare->execute([$array_colors[$_POST['color']], $_POST['usuario']]);

$insert_prepare = null;
$conn = null;

header('location:index.php');