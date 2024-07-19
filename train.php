<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\ModelEarthquakes;

// CRÉE LE MODÈLE À ENTRAINER
$model = new ModelEarthquakes(new PDO('mysql:dbname=SafeGuards;host=127.0.0.1', 'root', 'root'));

// LANCE L'ENTRAINEMENT SUR UN NOMBRE DE DONNÉES ALÉATOIRES
// LE MODÈLE SERA ENREGISTRÉ SOUS "tmp_model.rbx"
$model->train('tmp_model.rbx', 10000);

// VALIDE LE MODÈLE AVEC 10 ITÉRATIONS DE 500 TESTS
// LE FICHIER DU MODÈLE SERA RENOMMÉ POUR INCLURE LA PRÉCISION OBTENUE
$model->validate('tmp_model.rbx', 500, 10, true);
