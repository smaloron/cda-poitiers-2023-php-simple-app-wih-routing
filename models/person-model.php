<?php
require_once MODEL_DIR . "/address-model.php";

/**
 * Retourne l'ensemble des personnes avec leur adresse
 *
 * @return array
 */
function findAllPersons(): array
{
    $pdo = getPDO();
    $statement = $pdo->query("SELECT * FROM vue_personnes_adresses");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function insertPerson(array $data)
{
    $pdo = getPDO();

    // début de la transaction SQL
    $pdo->beginTransaction();
    // 1. éliminer la clef submit de data
    // et séparer data en deux tableaux person et address
    unset($data["submit"]);
    $person = $data["person"];
    $address = $data["address"];

    try {
        // 2. Chercher si l'adresse n'existe pas déjà
        // Si elle existe alors on récupère son id
        $address = findAddresses($address);

        // 3. Si l'adresse n'existe pas on va la créer avec la méthode insert de address-model
        if (count($address) === 0) {
            insert($address);
        } else {
            $address = $address[0];
        }

        // Insérer les données de la personne avec l'id de son adresse
        $sql = "INSERT INTO personnes (prenom, nom, id_adresse)
    VALUES (:prenom, :nom, :id_adresse)";
        $person["id_adresse"] = $address["id"];
        $statement = $pdo->prepare($sql);

        $pdo->commit();

        return $statement->execute($person);
    } catch (PDOException $error) {
        // Annulation des opération sde la transaction
        $pdo->rollBack();
        // Transmission d'une Exception au reste du programme
        throw new Exception("Impossible de valider les opérations");
        return false;
    }
}