<?php
require MODEL_DIR . "/address-model.php";

// faire une requête pour récupérer la liste des adresses
$data = findAll();
// Afficher une vue pour présenter cette liste dans une table html
render(
    "address/list",
    [
        "addressList" => $data
    ]
);
/*
rue | code_postal | ville | Actions
aa  | aaaaaaa     | aaaaa | supprimer modifier
*/