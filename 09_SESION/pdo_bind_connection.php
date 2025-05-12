<?php

// php -S localhost:8001
// Fichero de conexión : pdo_bind_connection.php
$host = 'localhost';
$dbname = 'colores';
$port = 3307;
$username = 'colores';
$password = 'colores';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    // echo "Conexión exitosa a la base de datos.";


} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
    echo "Error de conexión: " . $e->getMessage();
    exit();
}