<?php

use Core\Database;
use Core\Images;

$db = new Database();


$AllCategories = $db->findAll("SELECT * FROM categories  ORDER BY name ASC");



require view("/admin/categories.php");
