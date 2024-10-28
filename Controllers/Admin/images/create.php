<?php


require_once realpath(__DIR__ . '/../../../vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../../public");
$dotenv->load();

require "./Core/Database.php";
require "./Core/Images.php";

use Core\Images;

$db = new Images();

$db->uploadImage($_FILES, "");
header("Location:" . "/admin/imagens");
