<?php

/**
 * Retourne l'ensemble des adresses
 *
 * @return array
 */
function findAll(): array
{
    $pdo = getPDO();
    $statement = $pdo->query("SELECT * FROM vue_personnes_adresses");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}