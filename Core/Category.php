<?php

require_once realpath(__DIR__ . '/../vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../public/");
$dotenv->load();

use Core\Database;

$db = new Database();
$db->insert('INSERT INTO categories(name) VALUES(:name)', [
    "name" => $_POST["newCategory"]
]);

$newCategory = $db->find("SELECT * from categories ORDER BY id DESC LIMIT 1");

// var_dump($newCategory["id"]);
echo '<option value="' . $newCategory['id'] . '">' . $newCategory['name'] . '</option>';
