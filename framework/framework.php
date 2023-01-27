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
 * Calcul le rendu d'une vue php et retourne ce résulat sous forme de variable
 *
 * @param string $viewName
 * @param array $params
 * @return string
 */
function getTemplateContent(string $viewName, $params = []): string
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

    return ob_get_clean();
}

/**
 * Affiche le contenu d'une vue
 *
 * @param string $viewName le nom de la vue
 * @param array $params les variables disponibles pour la vue
 * @param string $layout le gabarit dans lequel s'affiche la vue
 * @return void
 */
function render(string $viewName, $params = [], $layout = "layout")
{

    $layoutPath = VIEW_DIR . "/$layout.php";

    if (file_exists($layoutPath)) {
        $params["viewContent"] = getTemplateContent($viewName, $params);
        extract($params);
        include $layoutPath;
    } else {
        $params["error"] = "La vue $viewName n'existe pas";
        extract($params);
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        include VIEW_DIR . "/render-error-view.php";
    }
}