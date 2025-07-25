<?php

use Core\Database;

$db = new Database();

$timeNow = strtotime(date('m/d/Y h:i:s a', time()));


$adsFront = $db->findAll("SELECT link, file FROM ads WHERE position='top' AND (startsAt <= $timeNow AND endsAtendsAt >= $timeNow) AND status= 'on'");
$adsMobile = $db->findAll("SELECT link, file FROM ads WHERE position='mobile' AND (startsAt <= $timeNow AND endsAt >= $timeNow) AND status= 'on'");



require view("abort.php");
