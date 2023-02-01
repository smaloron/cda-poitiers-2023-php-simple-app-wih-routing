<?php
ob_start();

// Constantes pour les chemins de l'application
define("ROOT_DIR", dirname(__DIR__));
define("CONTROLLER_DIR", ROOT_DIR . "/controllers/");
define("VIEW_DIR", ROOT_DIR . "/views/");
define("MODEL_DIR", ROOT_DIR . "/models");
define("DATA_DIR", ROOT_DIR . "/data");

require ROOT_DIR . "/framework/framework.php";
// Fonctions pour la création d'une connexion à la BD
require ROOT_DIR . "/config.php";
require MODEL_DIR . "/pdo.php";

// Récupération du paramètre de la page demandée
// Si pas de paramètre le valeur par défaut est home
$page = $_GET["page"] ?? "home";


// Inclusion du contrôleur
include getController($page);