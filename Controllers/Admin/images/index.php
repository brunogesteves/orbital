<?php


use Core\Images;

$db = new Images();
$allImages = $db->getImages();


require view("/admin/images.php");
