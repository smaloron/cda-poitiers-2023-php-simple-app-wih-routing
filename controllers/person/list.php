<?php
// Inclusion du fichier du modèle
require MODEL_DIR . "/person-model.php";

// Appel d'un fonction du modèle
$persons = findAllPersons();

// Affichage de la vue
render("person/list", ["personList" => $persons]);