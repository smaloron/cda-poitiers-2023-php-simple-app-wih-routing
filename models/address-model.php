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

/**
 * Supprime une adresse en fonction de son id
 *
 * @param integer $id l'identifiant de l'adresse
 * @return boolean l'opération est elle un succès
 */
function deleteOneById(int $id): bool
{
    $pdo = getPDO();
    $statement = $pdo->prepare("DELETE FROM adresses WHERE id =?");
    return $statement->execute([$id]);
}

/**
 * Met à jour une adresse en fonction d'un tableau associatif représentant les infos de cette adresse
 *
 * @param array $data
 * @return boolean
 */
function update(array $data): bool
{
    $pdo = getPDO();
    $sql = "UPDATE adresses SET 
    rue=:rue, code_postal=:code_postal, ville=:ville WHERE id=:id";
    $statement = $pdo->prepare($sql);
    return $statement->execute($data);
}