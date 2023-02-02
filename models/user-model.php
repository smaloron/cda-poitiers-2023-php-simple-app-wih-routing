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