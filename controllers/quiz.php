<?php
include MODEL_DIR . "/quiz-model.php";

// Traitement du formulaire
$isPosted = filter_has_var(INPUT_POST, "submit");
if ($isPosted) {
    $answers = filter_input(INPUT_POST, "answers", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
}

$params = [
    "quiz" => findAll(),
    "answers" => $answers ?? []
];

render("quiz", $params);
