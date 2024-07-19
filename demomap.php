<?php

require_once './lib/map.php';

// CHARGE LA CARTE MERCATOR
$mapFilename = '.\_ressources\images\mercator-map-squared.jpg';
$image = imagecreatefromjpeg($mapFilename);

// TAILLE ET COULEUR DES POINTS
$size = 4;
$color = (object)['r' => 0, 'g' => 0, 'b' => 0];

// AJOUT DE QUELQUES VILLES EN EXEMPLE
addPointOnMap(48.8575, 2.3514,    $image, $size, $color, 'Paris');
addPointOnMap(51.5072, 0.1276,    $image, $size, $color, 'Londres');
addPointOnMap(40.7128, -74.0060,  $image, $size, $color, 'New-York');
addPointOnMap(41.8967, 12.4822,   $image, $size, $color, 'Rome');
addPointOnMap(28.6139, 77.2088,   $image, $size, $color, 'New Delhi');
addPointOnMap(14.6919, -17.4474,  $image, $size, $color, 'Dakar');
addPointOnMap(-26.2008, 28.0484,  $image, $size, $color, 'Johannesburg');
addPointOnMap(-37.8140, 144.9633, $image, $size, $color, 'Melbourne');
addPointOnMap(68.3477, -166.8080, $image, $size, $color, 'Point Hope');
addPointOnMap(-15.7797, -47.9297, $image, $size, $color, 'Brasilia');
addPointOnMap(-33.9077, 18.4196,  $image, $size, $color, 'Le Cap'); 
addPointOnMap(55.7574, 37.6191,   $image, $size, $color, 'Moscou'); 
addPointOnMap(39.9390, 116.2326,  $image, $size, $color, 'Pékin'); 
addPointOnMap(59.5644, 150.7999,  $image, $size, $color, 'Magadan'); 
addPointOnMap(68.785, 16.4356,    $image, $size, $color, 'Harstad'); 
addPointOnMap(-33.4723, -70.7946, $image, $size, $color, 'Santiago'); 
addPointOnMap(33.3118, 44.2735,   $image, $size, $color, 'Bagdad'); 
addPointOnMap(34.020, -118.576,   $image, $size, $color, 'Los Angeles'); 

// ENREGISTREMENT DE L'IMAGE EN JPG
imagejpeg($image, 'map.jpg');

// DESTRUCTION DE L'OBJET GDIMAGE 
imagedestroy($image);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="./map.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>