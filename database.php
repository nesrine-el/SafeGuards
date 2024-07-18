<?php

function dbConnect(){

    /* Connexion à une base MySQL avec l'invocation de pilote */
    $dsn = 'mysql:dbname=SafeGuards;host=127.0.0.1';
    $user = 'root';
    $password = '';

    return new PDO($dsn, $user, $password);
}