<?php

use Core\Database;

$db = new Database();


$id = $_POST["catIdDelete"];

$db->delete("DELETE FROM categories WHERE id=$id");

header('Location: ' . "/admin/categorias");
