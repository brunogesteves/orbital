<?php

use Core\Images;



$getImages = new Images();
date_default_timezone_set('America/Sao_Paulo');

$allImages = $getImages->getImages();
$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');


require view("admin/add.php");
