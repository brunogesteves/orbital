<?php


use Core\Images;

$db = new Images();
$images = $db->getImages();


require view("/admin/images.php", [
    "images" => $images
]);
