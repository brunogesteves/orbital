<?php
$uri = explode("?", $_SERVER['REQUEST_URI']);
$id = (int) str_replace("id=", "", $uri[1]);

use Core\Database;

$db = new Database();
$ad = $db->find("SELECT * FROM ads WHERE id=$id");

date_default_timezone_set('America/Sao_Paulo');

$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');
// var_dump($ad);
require view("/admin/editAd.php");
