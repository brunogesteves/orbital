<?php


require_once realpath(__DIR__ . '/../../../vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../../public");
$dotenv->load();


use Core\Images;

$db = new Images();

$db->uploadImage("images", $_FILES);
header("Location:" . "/admin/imagens");
