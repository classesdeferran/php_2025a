<?php
session_start();
require_once 'pdo_bind_connection.php';
// print_r($_GET['token']);

// Verificar la caducidad del token
$ahora = new DateTime();
$ahora = $ahora->format('Y-m-d H:i:s');


if (!$_GET['token']) {
    header('Location:index.php');
    exit();
}

// Comprobar si el token existe en la tabla temporal
$select = "SELECT * FROM temporal WHERE token_registro = :token";
$prep = $pdo->prepare($select);
$prep->bindParam(':token', $_GET['token'], PDO::PARAM_STR);
$prep->execute();
$usuario = $prep->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header('Location:index.php');
    exit();
}

// echo "Ahora: " . $ahora . "<br>";
// echo "Fecha de caducidad: " . $usuario['token_caducidad'] . "<br>";
// exit();

if ($usuario['token_caducidad'] < $ahora) {
    // Token caducado
    header('Location:index.php?formulario=token-caducado');
    exit();
}

$insert = "INSERT INTO USUARIOS(usuario, email, telefono, password) 
VALUES(:usuario, :email, :telefono, :password)";
$prep = $pdo->prepare($insert);
$prep->bindParam(':usuario', $usuario['usuario'], PDO::PARAM_STR);
$prep->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
$prep->bindParam(':telefono', $usuario['telefono'], PDO::PARAM_STR);
$prep->bindParam(':password', $usuario['password'], PDO::PARAM_STR);
$prep->execute();

// Eliminar el usuario de la tabla temporal 
$delete = "DELETE FROM temporal WHERE token_registro = :token";
$prep = $pdo->prepare($delete);
$prep->bindParam(':token', $_GET['token'], PDO::PARAM_STR);
$prep->execute();

// Eliminar las filas con token caducados
$delete = "DELETE FROM temporal WHERE token_caducidad < :token";
$prep = $pdo->prepare($delete);
$prep->bindParam(':token', $ahora, PDO::PARAM_STR);
$prep->execute();

// Redirigir al usuario a la página de inicio de sesión
$_SESSION['nombre-usuario'] = $usuario['usuario'];
header('Location:index.php?formulario=login&mensaje=registro_ok');

$prep = null; // Cerrar la consulta
$pdo = null; // Cerrar la conexión