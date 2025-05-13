<?php
/* Conexión a base de datos MySQL mediante PDO */

$server_name = "127.0.0.1";
$server_name = "localhost";
$database = "colores";
$port = 3307;
$user = "root";
$password = "root";

try {

    $conn = new PDO ("mysql:host=$server_name;port=$port;dbname=$database", $user, $password);

    // echo "¡Conectados a $database!";

    // foreach ($conn -> query('SELECT * FROM colores') as $fila) {
    //     echo $fila['usuario'];
    // }


} catch (PDOException $err) {
    /* Mostrar el error de conexión */ 
    echo "Error $err";
}



