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

/**
 * Affiche le contenu d'une vue
 *
 * @param string $viewName
 * @return void
 */
function render(string $viewName, $params = [])
{
    $viewPath = VIEW_DIR . "/{$viewName}-view.php";
    if (file_exists($viewPath)) {
        extract($params);
        include $viewPath;
    } else {
        $params["error"] = "La vue $viewName n'existe pas";
        extract($params);
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        include VIEW_DIR . "/render-error-view.php";
    }
}