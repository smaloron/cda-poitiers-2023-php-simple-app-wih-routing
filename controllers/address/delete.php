<?php
require MODEL_DIR . "/address-model.php";

// Récupération de l'id
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

try {
    // Suppression dans la BD
    deleteOneById($id);
    header("location:/address/list");
} catch (PDOException $error) {
    $err = DEBUG ? $error->getMessage() : "Impossible de réaliser cette opération";

    render("render-error", ["error" => $err]);
}
