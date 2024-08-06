<?php


use Core\Database;

$db = new Database();

$images = $db->findAll("select * from images");
$countries = require ("Components/languages.php");
date_default_timezone_set('America/Sao_Paulo');
$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');



require view("admin/search.php", [
    "images" => $images,
    "countries" => $countries,
    "minTime" => $minTime,
]);