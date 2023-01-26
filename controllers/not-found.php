<?php

header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");

render("not-found", ["page" => $page]);

//include VIEW_DIR . "/not-found-view.php";