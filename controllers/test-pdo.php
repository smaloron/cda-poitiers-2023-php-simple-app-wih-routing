<?php
require MODEL_DIR . "/address-model.php";

var_dump(findOneById(7));

$address = [
    "rue" => "3 rue des Granges",
    "code_postal" => "25000",
    "ville" => "Besançon"
];
// insert($address);

//var_dump(deleteOneById(5));

//var_dump(deleteOneById(6));

$address = findOneById(4);
$address["ville"] = "BY";
$address["code_postal"] = "25440";

var_dump(update($address));

var_dump(findAll());