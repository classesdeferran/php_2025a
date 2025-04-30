<?php
// Los comentarios en PHP se ponen así
# Este también es un comentario de una linea
/* Otro comentario */

$variable1 = "minúsculas";
$VARIABLE1 = "mayúsculas";

echo $variable1." ".$VARIABLE1;
echo "<br>";
echo $variable1, " ", $VARIABLE1;
print $variable1;
// print $variable1, $VARIABLE1; // error


$yo = "Felipe";
echo "<br>";
$string1 = "Hola ".$yo;
echo $string1;
echo "<br>";
$string2 = "<h1>Hola $yo</h1>";
echo $string2;
echo "<br>";
$string3 = 'Hola $yo';
echo $string3;
echo "<br>";

const PI_1 = 3.1416;
define("PI_2", 3.1416);
echo PI_2;
echo "<br>";

$num1 = 100;
echo gettype($num1);
echo "<br>";
$num2 = "100";
echo gettype($num2);
echo "<br>";

$unEntero = 2;
$unDecimal = 2.0;
$unString = "soy un string";
$unBooleno = true; // false
$PI = 3.1416;
$PI = 6.28;

echo "========================================="."<br>";
$num1 = '10';
$num2 = 2;

echo "Concatenación : ". $num1 . $num2; // 102
echo "Suma : ". $num1 + $num2; // 

echo "========================================="."<br>";


// Diferencia igualdad de valor y de valor con tipo (estricta)
if ($num1 === $num2) {
    echo "Cierto";
} else  {
    echo "Falso";
}
echo "<br>";

var_dump($num1);
echo "<br>";

$miArray = ['cerezas', "fresas", "nísperos"];
var_dump($miArray);
echo "<br>";
print_r($miArray);



?>