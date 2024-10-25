<?php


use Core\Images;

$db = new Images();
$images = $db->allImages();


require view("/admin/images.php", [
    "images" => $images
]);
