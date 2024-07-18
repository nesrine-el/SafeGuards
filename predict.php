<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'database.php';

use App\ModelsML\ModelEarthquakes;

// CRÉE LE MODÈLE À ENTRAINER
$model = new ModelEarthquakes(dbConnect());

// CHARGE LE MODÈLE SAUVEGARDÉ
$model->loadSavedModel('earthquakes_model_66.rbx');

// LANCE UNE PRÉDICTION AVEC latitude et longitude
$value = $model->predict(59.9272,  -152.8161); // 59.9272 / -152.8161 attendu .5
echo "Notre I.A. a estimé qu'un séisme à ces coordonnées aurait une magnitude de $value (.5) sur l'echelle de Richter.\n";

$value = $model->predict(19.373, -155.2764); // 19.373 / -155.2764 attendu 3.4
echo "Notre I.A. a estimé qu'un séisme à ces coordonnées aurait une magnitude de $value (3.4) sur l'echelle de Richter.\n";

$value = $model->predict(36.2305, 71.2301); // 36.2305 / 71.2301 attendu 4
echo "Notre I.A. a estimé qu'un séisme à ces coordonnées aurait une magnitude de $value (4) sur l'echelle de Richter.\n";

$value = $model->predict(-6.4887, 149.4228); // -6.4887 / 149.4228 attendu 5.2
echo "Notre I.A. a estimé qu'un séisme à ces coordonnées aurait une magnitude de $value (5.2) sur l'echelle de Richter.\n";

$value = $model->predict(50.132, 147.6405); // 50.1322 / 147.6405 attendu 5.9
echo "Notre I.A. a estimé qu'un séisme à ces coordonnées aurait une magnitude de $value (5.9) sur l'echelle de Richter.\n";

$value = $model->predict(48.866667, 2.333333); // 48.866667 / 2.333333 attendu ???
echo "Notre I.A. a estimé qu'un séisme à PARIS aurait une magnitude de $value sur l'echelle de Richter.\n";





