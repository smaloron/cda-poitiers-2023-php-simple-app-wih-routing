<?php
require MODEL_DIR . "/person-model.php";

$isPosted = filter_has_var(INPUT_POST, "submit");

if ($isPosted) {
    try {
        insertPerson($_POST);
    } catch (Exception $err) {
        // gestion de l'erreur
    }
}

render('person/form', []);