<?php
include MODEL_DIR . "/quiz-model.php";

$params = [
    "quiz" => findAll()
];

render("quiz", $params);
