<?php

use Core\Database;

$db = new Database();


$id = $_POST["id"];
$file = $_POST["image"];

$db->delete("DELETE FROM ads WHERE id=$id");
$filename = "../../../public/images/ads" . $file;
if (file_exists($filename)) {
    unlink($filename);
}


header('Location: ' . "/admin/ads");
