<?php
/*
echo saludar("Steve");

$saludo_Maria = saludar("Maria");
echo $saludo_Maria;

function saludar( $nombre ) {
    return "Hola $nombre !";
}*/


$nombre = "Son-Goku";

echo "La variable es $nombre";
echo "<br>";

function indicarNombre () {
    global $nombre;
    return $nombre;
}

echo "La variable devuelta por la función es " . indicarNombre();


function mostrarAlumnos ( $nombre, $apellido) {
    // 1. nombre apellido
    static $posicion = 1;
    echo "<br>$posicion. $nombre $apellido ";
    $posicion++;
}

mostrarAlumnos("Son", "Goku");
mostrarAlumnos("Peter", "Parker");
mostrarAlumnos("Lois", "Lane");
mostrarAlumnos("Clark", "Kent");
mostrarAlumnos("Steve", "Jobs");

$indice = 1;
function mostrarAlumnosGlobal ($nombre, $apellido) {
    global $indice;
    echo "<br>$indice. $nombre $apellido ";
    $indice++;

}

mostrarAlumnosGlobal("Son", "Goku");
mostrarAlumnosGlobal("Peter", "Parker");
mostrarAlumnosGlobal("Lois", "Lane");
mostrarAlumnosGlobal("Clark", "Kent");
MOSTRARAlumnosGlobal("Steve", "Jobs");