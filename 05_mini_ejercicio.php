<?php

// Vamos a tener una variable llamada edad y
// otra con el nombre de la persona
// Hay que mostrar un mensaje que diga
// "Fulanitx eres mayor de edad"



// Encontrar la fruta más cara y el promedio de
// los precios a partir de este array

$frutas = [
['cerezas', 9.5], ['naranjas', 2.5], ['plátano', 4.35],['kiwi', 5.6], ['manzana', 2.25]
];


// Tenemos una frutería y vamos a vender y comprar frutas.
// Necesitamos una función para vender frutas y otra para comprarlas


$frutas = [ 
    ["nombre" => "cerezas", "precio" => 9.5, "stock_kg" => 20],
    ["nombre" => "naranjas", "precio" => 2.5, "stock_kg" => 40],
    ["nombre" => "plátano", "precio" => 4.35, "stock_kg" => 35],
    ["nombre" => "kiwi", "precio" => 5.6, "stock_kg" => 10],
    ["nombre" => "manzana", "precio" => 2.25, "stock_kg" => 25]
];



// Crear funciones para vender y comprar
// Para vender la fruta vender_fruta ( fruta, cantidad)
// Venta de cerezas 5.0 Kg x 9.5€ = 47.5€

// Tiene que actualizar el array $frutas

// Para comprar frutas ( fruta, cantidad, precio)
// Pero si la fruta no está la añadiremos