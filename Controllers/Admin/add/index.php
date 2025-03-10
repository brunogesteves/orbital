<?php

use Core\Images;
use Core\Database;

$db = new Database();


$getImages = new Images();
date_default_timezone_set('America/Sao_Paulo');

$allImages = $getImages->getImages();
$AllCategories = $db->findAll("SELECT * FROM categories  ORDER BY name ASC");

$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');


require view("admin/add.php");
