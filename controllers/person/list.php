<?php
require MODEL_DIR . "/person-model.php";

$persons = findAllPersons();

render("person/list", ["personList" => $persons]);