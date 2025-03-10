<?php

use Core\Database;
use Core\Images;

$db = new Database();

$name = $_POST["newCategory"];


$newCategory = $db->insert('INSERT INTO categories(name) VALUES(:name)', [
    "name" => $name
]);


if ($newCategory) header('Location: ' . "/admin/categorias");
