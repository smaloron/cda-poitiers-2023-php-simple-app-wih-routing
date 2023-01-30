<?php
include MODEL_DIR . "/quiz-model.php";

$id = filter_input(INPUT_GET, "id", FILTER_DEFAULT);

$quiz = findAll();
$question = findOneQuestionById($id, $quiz);

render(
    "quiz-form",
    [
        "title" => "Modification d'un question",
        "question" => $question,
        "updateMode" => true
    ]
);
