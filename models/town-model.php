<?php

/**
 * Retourne la liste des villes correspondant à un code postal
 *
 * @param string $zipCode
 * @return array | bool
 */
function findTownsByZipCode(string $zipCode): array | bool
{
    $pdo = getPDO();
    $statement = $pdo->prepare("SELECT ville_nom FROM villes_france_free WHERE ville_code_postal = ?");
    $statement->execute([$zipCode]);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}