<?php
require MODEL_DIR . "/user-model.php";

$message = "";


// Test pour savoir les les données ont été postées
if (filter_has_var(INPUT_POST, "userName")) {
    // Si oui on récupère les données
    $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pass = filter_input(INPUT_POST, "userPassword", FILTER_DEFAULT);
    // appel à la fonction authenticate
    if (authenticate($userName, $pass)) {
        // Si true : redirection vers home
        header("location:/home");
    } else {
        // Sinon message d'erreur
        $message = "Vos infos de connexion sont incorrectes";
    }
}

// Affichage de la vue en transmettant l'éventuel message d'erreur
render("register", ["message" => $message]);