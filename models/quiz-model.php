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

/**
 * Recherche un index dans un tableau ordinal 
 * en fonction d'un critère déterminé par la fonction
 * callback passée en argument
 *
 * @param array $source le tableau dans leque on cherche
 * @param callable $callback la fonction callback 
 *                           qui doit retourner un booléen
 * @return integer
 */
function findIndex(array $source, callable $callback): int
{
    $foundIndex = -1;
    $arraySize = count($source);
    for ($i = 0; $i < $arraySize; $i++) {
        if ($callback($source[$i])) {
            $foundIndex = $i;
            break;
        }
    }

    return $foundIndex;
}
/**
 * Mise à jour d'une question
 *
 * @param array $quiz les données du quiz 
 *              comprenant l'ensemble des questions
 * @param array $question les nouvelles données de la question
 * @return void
 */
function updateQuestion(array $quiz, array $question)
{
    // Recherche de l'index de la question à modifier
    $index = findIndex($quiz["questions"], function ($item) use ($question) {
        return $item["id"] == $question["id"];
    });

    // Modification et sauvegarde de la question
    if ($index >= 0) {
        $quiz["questions"][$index] = $question;
        file_put_contents(QUIZ_PATH, json_encode($quiz));
    }
}

function findOneQuestionById(int $id, array $quiz): array
{
    return array_filter(
        $quiz["questions"],
        function ($item) use ($id) {
            return $item["id"] == $id;
        }
    );
}