<?php

$pdo = getPDO();

$result = $pdo->query("SELECT * FROM adresses");



var_dump(
    $result->fetchAll(PDO::FETCH_OBJ)
);

var_dump(
    $result->fetch()
);