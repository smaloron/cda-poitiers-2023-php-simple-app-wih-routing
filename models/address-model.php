<?php

/**
 * Retourne l'ensemble des adresses
 *
 * @return array
 */
function findAll(): array
{
    $pdo = getPDO();
    $statement = $pdo->query("SELECT * FROM adresses");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Récupère les infos d'une adresse
 *
 * @param integer $id 
 * @return array
 */
function findOneById(int $id): array
{
    $pdo = getPDO();
    $statement = $pdo->prepare("SELECT * FROM adresses WHERE id=?");
    $statement->execute([$id]);
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    return $data ? $data : [];
}

/**
 * Insertion d'une adresse
 *
 * @param array $data les données à insérer, le tableau est passé par référence (&) afin de pouvoir injecter l'id après l'insertion
 * @return bool
 */
function insert(array &$data): bool
{
    $pdo = getPDO();

    $sql = "INSERT INTO adresses (rue, code_postal, ville)
    VALUES (:rue, :code_postal, :ville)";
    $statement = $pdo->prepare($sql);
    $success =  $statement->execute($data);
    $data["id"] = $pdo->lastInsertId();
    return $success;
}