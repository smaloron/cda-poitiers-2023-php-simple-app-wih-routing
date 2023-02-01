<?php
require MODEL_DIR . "/address-model.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

// traitement du formulaire
$isPosted = filter_has_var(INPUT_POST, "submit");
if ($isPosted) {
    $address = $_POST;
    $address["id"] = $id;
    unset($address["submit"]);
    update($address);

    header("location:/address/list");
}


$address = findOneById($id);

render('address/form', ["address" => $address]);