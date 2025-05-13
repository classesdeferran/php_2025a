<?php
// Llamar al fichero de la conexión
require_once 'conexion.php';
// echo $_GET['id'];


$delete = "delete from colores where id_color = ?;";
$delete_prepare = $conn->prepare($delete);
$delete_prepare->execute([$_GET['id']]);

$delete_prepare = null;
$conn = null;

header('location:index.php');