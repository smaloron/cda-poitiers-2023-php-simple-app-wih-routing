<?php

/**
 * Insère un nouvel utilisateur
 *
 * @param array $user
 * @return bool
 */
function insertUser(array $user)
{
    $pdo = getPDO();
    $sql = "INSERT INTO users (user_name, user_password)
    VALUES (:userName, :userPassword)";
    $statement = $pdo->prepare($sql);
    return $statement->execute($user);
}

function authenticate(string $userName, string $pass): bool
{
    // Trouver un utilisateur qui possède le userName passé en argument
    // si aucun utilisateur trouvé on retourne faux

    // comparer les mots de passe avec la fonction password_verify
    // retourne le résultat de la vérification


}