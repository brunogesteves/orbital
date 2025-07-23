<?php

use Core\Database;

$db = new Database();
date_default_timezone_set('America/Sao_Paulo');

$timeNow = strtotime(date('m/d/Y h:i:s a', time()));
$posts = $db->findAll("SELECT p.*, i.name as image FROM post p INNER JOIN image i ON i.id = p.image_id WHERE p.status = 'on' ORDER BY p.post_at asc");
$categories = $db->findAll("SELECT * FROM category  ORDER BY name ASC");

$adsFront = $db->findAll("SELECT link, file FROM ad WHERE position='top' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");
$adsMobile = $db->findAll("SELECT link, file FROM ad WHERE position='mobile' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");

$level1 = [];
$level2 = [];
$level3 = [];
$level4 = [];

for ($x = 0; $x < sizeof($posts); $x++) {
    if ($posts[$x]["section"] === "n1" && sizeof($level1) < 4) {
        array_push($level1, $posts[$x]);
    }
    if ($posts[$x]["section"] === "n2" && sizeof($level2) < 4) {
        array_push($level2, $posts[$x]);
    }
    if ($posts[$x]["section"] === "n3" && sizeof($level3) < 7) {
        array_push($level3, $posts[$x]);
    }
    if ($posts[$x]["section"] === "n4" && sizeof($level4) < 9) {
        array_push($level4, $posts[$x]);
    }
}


require view("home.php");
