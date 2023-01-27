<?php
ob_start();

// Constantes pour les chemins de l'application
define("ROOT_DIR", dirname(__DIR__));
define("CONTROLLER_DIR", ROOT_DIR . "/controllers/");
define("VIEW_DIR", ROOT_DIR . "/views/");
define("MODEL_DIR", ROOT_DIR . "/models");
define("DATA_DIR", ROOT_DIR . "/data");

require ROOT_DIR . "/framework/framework.php";

// Récupération du paramètre de la page demandée
// Si pas de paramètre le valeur par défaut est home
$page = $_GET["page"] ?? "home";


// Inclusion du contrôleur
include getController($page);