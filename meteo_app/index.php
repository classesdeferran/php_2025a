<?php

$city = "Sidney";
$appid = "bc5c4db4465795f95c6113041a40d3bb";
$units = "metric";
$lang = "es";

$URL = "https://api.openweathermap.org/data/2.5/weather?q=$city&units=$units&lang=$lang&appid=$appid";

$data = file_get_contents($URL);
$data = json_decode( $data, true);

// print_r($data);

$icono = $data['weather'][0]['icon'];



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meteo APP</title>
</head>
<body>
    
<img src="https://www.imelcf.gob.pa/wp-content/plugins/location-weather/assets/images/icons/weather-icons/<?= $icono ?>.svg" alt="">
</body>
</html>