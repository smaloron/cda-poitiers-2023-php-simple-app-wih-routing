<?php
include MODEL_DIR . "/quiz-model.php";

$id = filter_input(INPUT_GET, "id", FILTER_DEFAULT);

$quiz = findAll();
$question = findOneQuestionById($id, $quiz);

$isPosted = filter_has_var(INPUT_POST, "submit");
if ($isPosted) {
    $question = $_POST;
    unset($question["submit"]);
    // TODO : gérer le cas où on ajoute une nouvelle réponse et le cas ou l'on a supprimé une réponse
    $question["id"] = $id;

    updateQuestion(findAll(), $question);

    header("location:/quiz-admin");
}

render(
    "quiz-form",
    [
        "title" => "Modification d'un question",
        "question" => $question,
        "updateMode" => true
    ]
);