<?php
require MODEL_DIR . "/address-model.php";

// traitement du formulaire
$isPosted = filter_has_var(INPUT_POST, "submit");
if ($isPosted) {
    $address = $_POST;
    unset($address["submit"]);
    insert($address);

    header("location:/address/list");
}

render('address/form', []);