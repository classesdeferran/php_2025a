<?php

echo saludar("Steve");

$saludo_Maria = saludar("Maria");
echo $saludo_Maria;

function saludar( $nombre ) {
    return "Hola $nombre !";
}