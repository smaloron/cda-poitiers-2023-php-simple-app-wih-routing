<?php
require MODEL_DIR . "/address-model.php";

var_dump(findOneById(7));

$address = [
    "rue" => "3 rue des Granges",
    "code_postal" => "25000",
    "ville" => "Besançon"
];
insert($address);

var_dump($address);