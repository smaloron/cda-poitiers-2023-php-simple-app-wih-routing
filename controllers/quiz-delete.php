<?php
include MODEL_DIR . "/quiz-model.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id) {
    deleteOneById($id);
}

header("location:/quiz-admin");