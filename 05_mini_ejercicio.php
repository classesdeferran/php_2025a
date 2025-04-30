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
// Ejemplo de salida por pantalla: 
// Venta de cerezas 5.0 Kg x 9.5€ = 47.5€
// No se pueden vender frutas que no estén en el array 
// ni tampoco cantidades superiores a las existencias

// Tiene que actualizar el array $frutas

// Para comprar frutas ( fruta, cantidad, precio)
// Pero si la fruta no está la añadiremos

// vender_fruta( $frutas, $nombre_fruta, $cantidad);

// $frutas = vender_fruta($frutas, "cerezas", 15);
vender_fruta($frutas, "cerezas", 25);
vender_fruta($frutas, "melones", 30);

vender_fruta($frutas, "cerezas", 15);
comprar_fruta($frutas, "peras", 30, 2);
vender_fruta($frutas, "peras", 15);



function vender_fruta (&$frutas, $nombre_fruta, $cantidad ) {

    $no_disponibilidad = true;
    foreach ( $frutas as $clave => &$producto) {
        // Ver si tenemos la fruta pedida
        if ( $producto['nombre'] == $nombre_fruta) {

            if ($producto['stock_kg'] >= $cantidad) {

                $stock_actualizado = $producto['stock_kg'] - $cantidad;
                $producto['stock_kg'] = $stock_actualizado;
                // print_r($frutas);
                echo "<br>";
                echo "Venta realizada de '$nombre_fruta': $cantidad kg x "
                . $producto['precio'] 
                . "€ = "
                . ($cantidad * $producto['precio'] );
                echo "<br>";
                echo "Ahora quedan $stock_actualizado de '$nombre_fruta'";

                

            } // Si no tenemos suficiente cantidad de producto
            else {
                echo "<br>";
                echo "Has pedido $cantidad pero sólo tenemos ".$producto['stock_kg']." kg de la fruta '$nombre_fruta'";
                echo "<br>";

            }

            $no_disponibilidad = false;
            break;
        }
    }

    if ($no_disponibilidad) {
        echo "<br>";
        echo "No tenemos la fruta '$nombre_fruta'";
        echo "<br>";

    }
    unset ($frutas);
    unset ($producto);
}

function comprar_fruta (&$frutas, $nombre_fruta, $cantidad, $precio) {

    $no_tengo_la_fruta = true;
    foreach ($frutas as &$producto ) {

        if ($producto['nombre'] == $nombre_fruta) {

            $producto['stock_kg'] += $cantidad;
            $producto['precio'] = $precio;

            echo "<br>";
            echo "Actualizada fruta '$nombre_fruta', con precio $precio € y cantidad "
            .$producto['stock_kg']
            . " kg" ;
                    echo "<br>";              

            break;
        }
    }

    if ($no_tengo_la_fruta) {

        $producto = ['nombre' => $nombre_fruta, 'precio' => $precio, 'stock_kg' => $cantidad];

        $frutas[] = $producto;

        echo "<br>";
        echo "Añadida fruta '$nombre_fruta', con precio $precio € y cantidad $cantidad kg" ;
        echo "<br>";
    }

    unset ($frutas);
    unset ($producto);
}







/*
// El & es para que actualice el array fuera de la función
function vender_fruta (&$frutas, $nombre_fruta, $cantidad) {
    $no_disponibilidad = true;
    foreach ($frutas as $clave => &$producto) {
        
        // buscamos si tenemos la fruta pedida
        if ($producto['nombre'] == $nombre_fruta) {

            // Si la tenemos revisamos la cantidad
            if ($producto["stock_kg"] >= $cantidad) {
                // Mensaje de la venta
                echo "<br>";
                echo "Venta de $nombre_fruta : $cantidad kg x 9.5€ = ". ($producto['precio'] * $cantidad) ."€";
                // stock actual
                $producto["stock_kg"] = $producto["stock_kg"] - $cantidad;
                // $stock_actualizado = $producto["stock_kg"] - $cantidad;
                // actualizamos es array de las $frutas
                // $frutas[$clave]["stock_kg"] = $stock_actualizado;
                echo "<br>";
                // Mensaje con el stock actualizado
                echo "Ahora quedan ". $producto["stock_kg"] ." kg de $nombre_fruta";
                
                echo "<br>";
                // print_r($frutas);
                echo "<br>";
            } else {
                echo "<br>";
                echo "Sólo tenemos ".$producto["stock_kg"]. " kg de la fruta '$nombre_fruta'";
                echo "<br>";
            }
            $no_disponibilidad = false;
            break;
        }    
        
    }

    unset ($frutas);
    unset ($producto);
    
    if ($no_disponibilidad) {
        echo "<br>";
            echo "No tenemos la fruta '$nombre_fruta'";
            echo "<br>";
        }
}

function comprar_fruta(&$frutas, $nombre_fruta, $cantidad, $precio)
{
    $fruta_nueva = true;
    foreach ($frutas as &$producto) {
        
        // Si tenemos la fruta actualizamos stock y precio
        if($producto['nombre'] == $nombre_fruta) {

            $producto["stock_kg"] += $cantidad;
            $producto["precio"] = $precio;
            
            $fruta_nueva = false;
            echo "<br>";
            echo "Actualizada la fruta '$nombre_fruta' -> precio: "
            .$producto["precio"]
            .", stock: ";
            $producto["stock_kg"];
            echo "<br>";

            break;
        } // Si no la tenemos la añadimos
    }

    if ($fruta_nueva) {
        $producto = [
            'nombre' => $nombre_fruta,
            'precio' => $precio,
            'stock_kg' => $cantidad
        ];
        $frutas[] = $producto;
        echo "<br>";
        echo "Añadida la fruta $nombre_fruta, precio: $precio, stock: $cantidad kg";
        echo "<br>";
    }

    unset ($frutas);
    unset ($producto);
}

*/

/*
// Con un return
function vender_fruta ($frutas, $nombre_fruta, $cantidad ) {

    $no_disponibilidad = true;
    foreach ( $frutas as $clave => $producto) {
        // Ver si tenemos la fruta pedida
        if ( $producto['nombre'] == $nombre_fruta) {

            if ($producto['stock_kg'] >= $cantidad) {

                $stock_actualizado = $frutas[$clave]['stock_kg'] - $cantidad;
                $frutas[$clave]['stock_kg'] = $stock_actualizado;
                print_r($frutas);
                echo "<br>";
                echo "Venta realizada de '$nombre_fruta': $cantidad kg x "
                . $producto['precio'] 
                . "€ = "
                . ($cantidad * $producto['precio'] );
                echo "<br>";
                echo "Ahora quedan $stock_actualizado de '$nombre_fruta'";

                

            } // Si no tenemos suficiente cantidad de producto
            else {
                echo "<br>";
                echo "Has pedido $cantidad pero sólo tenemos ".$producto['stock_kg']." kg de la fruta '$nombre_fruta'";
                echo "<br>";

            }


            $no_disponibilidad = false;
            break;
        }
    }

    if ($no_disponibilidad) {
        echo "<br>";
        echo "No tenemos la fruta '$nombre_fruta'";
        echo "<br>";

    }

    return $frutas;
}

*/