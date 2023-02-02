<?php
require MODEL_DIR . "/user-model.php";

$message = "";

// Traitement du formulaire
if (filter_has_var(INPUT_POST, "userName")) {

    // Récupération des données postées
    $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $plainPassword = filter_input(INPUT_POST, "userPassword", FILTER_DEFAULT);

    // Test de la validité des données
    if (!empty($userName) && !empty($plainPassword)) {
        // Création d'un utilisateur
        $user = [
            "userName" => $userName,
            "userPassword" => password_hash($plainPassword, PASSWORD_BCRYPT)
        ];

        // Insertion de l'utilisateur dans la BD
        if (insertUser($user)) {
            header("location:/home");
        } else {
            $message = "Inscription impossible pour le moment";
        }
    } else {
        $message = "Vos infos de connexion sont incorrectes";
    }
}


render("register", ["message" => $message]);