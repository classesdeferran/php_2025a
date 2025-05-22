<?php

session_start();
require_once 'pdo_bind_connection.php';

// Verificar lo que llega a insert_user.php
$verificarUsuario = isset($_POST['usuario']) && $_POST['usuario'];
$verificarpassword = isset($_POST['password']) && $_POST['password'];
$verificarpassword2 = isset($_POST['password2']) && $_POST['password2'];

if (!$verificarUsuario || !$verificarpassword || !$verificarpassword2) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
} 
// Quitar espacios en blanco
$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);
$password2 = trim($_POST['password2']);
$email = trim($_POST['email']);
$telefono = trim($_POST['telefono']);

// Verificar que no senvien datos vacíos
if (empty($usuario) || empty($password) || empty($password2)) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}


$usuario = htmlentities($usuario, ENT_QUOTES, 'UTF-8');
$password = htmlentities($password, ENT_QUOTES, 'UTF-8');
$password2 = htmlentities($password2, ENT_QUOTES, 'UTF-8');
$email = htmlentities($email, ENT_QUOTES, 'UTF-8');
$telefono = htmlentities($telefono, ENT_QUOTES, 'UTF-8');

if ($password !== $password2) {
    $_SESSION['error_cuenta'] = true;
    header('Location: crear_cuenta.php');
    exit();
}

// Verificar si el usuario existe
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario"); 
$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt->execute();
$usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuarioExistente) {
    $_SESSION['user_repe'] = true;
    header('Location: crear_cuenta.php');
    exit();
} 

// Encriptar la contraseña
$hash = password_hash($password, PASSWORD_DEFAULT);
// echo $hash . "<br>";

//  Creación de un token de 128 caracteres
$token = bin2hex(random_bytes(64));

// Establecer la caducidad
$caducidad = new DateTime();
$caducidad->add(new DateInterval('PT2H')); // caducidad de 2 horas
$caducidad = $caducidad->format('Y-m-d H:i:s'); 

$insert = "INSERT INTO temporal (usuario, password, email, telefono, token_registro, token_caducidad) ";
$insert .= "VALUES (:usuario, :password, :email, :telefono, :token, :caducidad)";

$stmt = $pdo->prepare($insert);
$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt->bindParam(':password', $hash, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
$stmt->bindParam(':token', $token, PDO::PARAM_STR);
$stmt->bindParam(':caducidad', $caducidad, PDO::PARAM_STR);
$stmt->execute();

// echo "Usuario insertado correctamente<br>";
$body = "<p>Apreciado/Apreciada $usuario,</p><br>";
$body .= "<p>Te envíamos el enlace para que puedas acceder a la aplicación:</p><br>";
$body .= "<a href='http://localhost:20000/registro.php?token=$token' > HAZ CLIC AQUÍ PORFA </a><br>";
$body .= "<p>Puedes ignorar este correo si no has accedido a la aplicación.</p><br>";

include 'email_validacion.php';

header('location: index.php?formulario=revisar-correo');


