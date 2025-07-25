<?php

use Core\Database;
use Core\Images;

$db = new Database();
$getImages = new Images();

$images = $getImages->getImages();


date_default_timezone_set('America/Sao_Paulo');
$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

require view("/admin/newAd.php");
