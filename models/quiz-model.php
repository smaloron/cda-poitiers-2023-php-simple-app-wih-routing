<?php
define("QUIZ_PATH", DATA_DIR . "/quiz.json");

function findAll(): array
{
    $content = file_get_contents(QUIZ_PATH);
    return json_decode($content, true);
}

function deleteOneById($id)
{
    $data = findAll();

    $questions = array_filter(
        $data["questions"],
        function ($item) use ($id) {
            return $item["id"] != $id;
        }
    );

    $data["questions"] = $questions;


    file_put_contents(QUIZ_PATH, json_encode($data));
}

function addQuestion($question)
{
    $data = findAll();
    $data["questions"][] = $question;
    file_put_contents(QUIZ_PATH, json_encode($data));
}