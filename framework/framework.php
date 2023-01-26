<?php

/**
 * Retourne le chemin vers un fichier contrôleur
 *
 * @param string $page le paramètre représentant le contrôleur
 * @return string le chemin vers le fichier du contrôleur
 */
function getController(string $page): string
{
    // Définition du chemin de fichier contrôleur à exécuter
    $controller = CONTROLLER_DIR . "$page.php";

    // Test de l'existence du contrôleur
    if (!file_exists($controller)) {
        $controller = CONTROLLER_DIR . "not-found.php";
    }

    return $controller;
}