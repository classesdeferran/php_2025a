<?php


$num = 0;

while ( $num < 5) {
    echo $num."<br>";
    $num++;
}

echo "********************"."<br>";

do {
    echo $num."<br>";
    $num++;
} while ($num < 5);

echo "********************"."<br>";

// Array indexado
$miArray = ['cerezas', "fresas", "nísperos"];

$miArray[] = "ciruela";
// $miArray[] = [];
echo $miArray[1];


for ($i = 0; $i < count($miArray); $i++ ) {
    echo "$i. $miArray[$i]"."<br>";
}
echo "<br>";

// foreach ( array as variable_temporal)
foreach ( $miArray as $fruta) {
    echo $fruta; // 'cerezas', "fresas", "nísperos"
    echo "<br>";
}

echo "<br>";
// Array multidimensional (array que contiene otros arrays)
$frutas = [
    ['cerezas', 9.5], ['naranjas', 2.5], ['plátano', 4.35],['kiwi', 5.6], ['manzana', 2.25]
    ];
echo "********************"."<br>";

// Array asociativo (clave : valor)
$arrayAsociativo = ["nombre" => "Pepe", "edad" => 25];

// foreach ( $array as $clave => $valor )
foreach ( $arrayAsociativo as $clave => $valor ) {
    echo "$clave -> $valor";
    echo "<br>";
}


echo "<br>";

echo "********************"."<br>";

$array1 = [];
$array1 = array();
$array1[] = "rojo";
$array1[] = "verde";
$array1[] = "azul";
array_push($array1, "amarillo");

var_dump($array1);

$arrayAsociativo2 = array("nombre" => "Pepe", "edad" => 25);

echo "<br>";

echo "********************"."<br>";

