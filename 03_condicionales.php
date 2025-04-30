<?php

$num = 0;

// if
if ($num > 0) {
    echo "$num es mayor que 0";
} else if ($num < 0) {
    echo "$num es menor que 0";
} else {
    echo 'la variable $num es 0';
}

echo "<br>";

echo "========================================="."<br>";

echo "OPERADORES LÓGICOS";
echo "and (y) -> &&"."<br>";
echo "or (o) -> ||"."<br>";
echo "not (no) -> != !=="."<br>";

$num1 = 20;
$num2 = 30;

if ( $num1 == 10 && $num2 == 20) {
    echo "Se cumplen las dos condiciones";
} elseif ( $num1 == 10 || $num2 == 20) {
    echo "Se cumple una de las dos condiciones";
} else {
    echo "No se cumple ninguna de las dos condiciones";
}

echo "<br>";
echo "========================================="."<br>";
echo "<br>";

$cast = (boolean)$num;
echo $cast;
echo "<br>";

// switch
switch ($num) {
    case $num > 0:
        echo "$num es mayor que 0";
        break;
    case $num < 0:
        echo "$num es menor que 0";
        break;
    default:
        echo 'la variable $num es 0';
}

// Valores que se asimilan a falso:
// 0, null, '', ""
