<?php

include_once("index.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Retrieve the raw POST data
    $jsonData = json_decode(file_get_contents('php://input'), true);

    if ($jsonData["req"] == "add") {

        echo  json_encode(["success" => "ok"]);
    }
    // Decode the JSON data into a PHP associative array
}
