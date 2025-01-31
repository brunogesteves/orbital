<?php

use Core\Database;

$db = new Database();

$timeNow = strtotime(date('m/d/Y h:i:s a', time()));


$adsFront = $db->findAll("SELECT link, file FROM ads WHERE position='top' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");
$adsMobile = $db->findAll("SELECT link, file FROM ads WHERE position='mobile' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");



require view("abort.php");
