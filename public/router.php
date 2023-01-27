<?php
$page = $_SERVER["PATH_INFO"] ?? "";
$query = $_SERVER["QUERY_STRING"] ?? "";
$scriptName = $_SERVER["PHP_SELF"] ?? "";

$filePath = getcwd() . "/public$scriptName";

if (file_exists($filePath)) {
    header("Content-Type: text/css");
    include $filePath;
    return;
}

$path = getcwd() . "/public/index.php";
$_GET["page"] = $page;

include $path;