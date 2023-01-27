<?php
define("QUIZ_PATH", "/data/quiz.json");

function findAll(): array
{
    $content = file_get_contents(QUIZ_PATH);
    return json_decode($content, true);
}