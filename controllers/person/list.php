<?php
require MODEL_DIR . "/person-model.php";

$persons = findAll();

render("person/list", ["personList" => $persons]);