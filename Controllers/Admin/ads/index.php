<?php

use Core\Database;
use Core\Images;

$db = new Database();
$getImages = new Images();

$images = $getImages->getImages();

$topAds = $db->findAll("SELECT * FROM ads  WHERE position= 'top'  ORDER BY starts_at DESC");
$mobileAds = $db->findAll("SELECT * FROM ads WHERE position= 'mobile'  ORDER BY starts_at DESC");
$newsAds = $db->findAll("SELECT * FROM ads  WHERE position= 'news' ORDER BY starts_at DESC");


date_default_timezone_set('America/Sao_Paulo');
$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

require view("/admin/ads.php");
