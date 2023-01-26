<?php

// Constantes pour les chemins de l'application
define("ROOT_DIR", dirname(__DIR__));
define("CONTROLLER_DIR", ROOT_DIR."/controllers/");


// Récupération du paramètre de la page demandée
// Si pas de paramètre le valeur par défaut est home
$page = $_GET["page"] ?? "home";

// Définition du chemin de fichier contrôleur à exécuter
$controller = CONTROLLER_DIR."$page.php";

// Test de l'existence du contrôleur
if(! file_exists($controller)){
    $controller = CONTROLLER_DIR."not-found.php";
}

//$controller = getController($page)

// Inclusion du contrôleur
include $controller;