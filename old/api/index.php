<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$config = [
    "host" => "89.117.7.103",
    "port" => 3306,
    "dbname" => "u148524531_orbital",
    "charset" => "utf8mb4"
];

$dsn = 'mysql:' . http_build_query($config, "", ";");

$connection = new PDO($dsn, "u148524531_orbital", "lya92WJOl7HLwW", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);



// }