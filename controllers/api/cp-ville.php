<?php
require MODEL_DIR . "/town-model.php";

$data = findTownsByZipCode($_GET["cp"]);


if ($data && is_array($data)) {
    header("Content-Type: application/json", true, 200);

    // Transformation du tableau ordinal de tableaux associatifs
    // en un simple tableau ordinal de string
    $data = array_map(function ($item) {
        return $item["ville_nom"];
    }, $data);

    echo json_encode($data);
} else {
    header("Content-Type: application/json", true, 404);
    echo json_encode(["message" => "Aucun résultat"]);
}