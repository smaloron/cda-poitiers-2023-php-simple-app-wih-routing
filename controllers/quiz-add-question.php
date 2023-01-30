<?php
include MODEL_DIR . "/quiz-model.php";

$question = [];

$isPosted = filter_has_var(INPUT_POST, "submit");
if ($isPosted) {
    $question = $_POST;
    unset($question["submit"]);
    $question["id"] = uniqid();

    addQuestion($question);

    header("location:/quiz-admin");
}

render(
    "quiz-form",
    [
        "title" => "Ajout d'une question",
        "question" => $question,
        "updateMode" => false
    ]
);