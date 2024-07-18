<?php

const MAP_FONT = '.\_ressources\fonts\HelveticaNeue.ttf';


/**
 * Convertie des coordonnées de latitude et longitude en coordonnées planaire
 * selon la projection de Mercator (projection de carte classique)
 *
 * @param float $latitude Latitude
 * @param float $longitude Longitude
 * @param integer $mapWidth Largeur de la carte désirée
 * @param integer $mapHeight Hauteur de la carte désirée
 * @return array Tableau contenant les coordonnées x et y du point sur la carte de Mercator
 */
function coordinatesToMercator(float $latitude, float  $longitude, int $mapWidth, int $mapHeight): array {
    // X, C'EST FACILE
    $x = ($longitude+180)*($mapWidth/360);

    // CONVERSION DE LA LATITUDE EN RADIANS
    $latRad = $latitude*pi()/180;

    // CALCUL DE Y, C'EST MOINS FACILE
    $mercN = log(tan((pi()/4)+($latRad/2)));
    $y     = ($mapHeight/2)-($mapWidth*$mercN/(2*pi()));

    return [(int)$x, (int)$y];

}

/**
 * Ajoute un point sur une carte en fonction de la latitude et longitude
 *
 * @param float $latitude Latitude
 * @param float $longitude Longitude
 * @param GdImage $image Image GdImage sur laquelle placer le point
 * @param integer $diameter Diamètre du point (défault 6)
 * @param object|null $color Objet représentant la couleur $color.r, $color.g, $color.b (défaut, noir)
 * @param string $label Texte optionnel à afficher
 * @return void
 */
function addPointOnMap(float $latitude, float $longitude, GdImage $image, int $diameter = 6, ?object $color = null, string $label = '') {

    $color = $color ?? (object)['r' => 0, 'g' => 0, 'b' => 0];

    // CONVERTIR LA LATITUDE ET LONGITUDE EN COORDONNÉES X ET Y EN UTILISANT LA PROJET DE MERCADOR
    [$x, $y] = coordinatesToMercator($latitude, $longitude, imagesx($image), imagesy($image));
    
    // DESSINER UN ROND DE DIAMETRE ET COULEUR DEMANDÉS
    $colorIdentifier = imagecolorallocate($image, $color->r, $color->g, $color->b);
    imagefilledellipse($image, $x, $y, $diameter, $diameter, $colorIdentifier);

    // AJOUTE LE LABEL
    imagettftext($image, 10, 0, $x + 6, $y-6, $colorIdentifier, MAP_FONT, $label);
}