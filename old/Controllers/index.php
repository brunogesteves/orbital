<?php

use Core\Database;
use Core\Coin;


$db = new Database();
date_default_timezone_set('America/Sao_Paulo');



$timeNow =strtotime( date('m/d/Y h:i:s a', time()));
$originalPosts = $db->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id ORDER BY p.post_at asc");
$extposts = $db->findAll("SELECT * FROM extposts WHERE status='on'");
$autoposts = $db->findAll("SELECT * FROM autoposts ORDER BY post_at	DESC Limit 8");


$adsFront = $db->findAll("SELECT link, file FROM ads WHERE position='front' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");
$adsSlide = $db->findAll("SELECT link, file FROM ads WHERE position='slide' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");
$adsMobile = $db->findAll("SELECT link, file FROM ads WHERE position='mobile' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");


$level1 = [];
$level2 = [];
$level3 = [];
$level4 = [];

for ($x = 0; $x <= sizeof($autoposts); $x++) {    
        if($autoposts[$x]["section"] === "n1" && sizeof($level1)<=2){
            array_push($level1, $autoposts[$x]);
        }
        
        if($autoposts[$x]["section"] === "n2" && sizeof($level2)<=2){
            array_push($level2, $autoposts[$x]);
        }
        
        if($autoposts[$x]["section"] === "n3" && sizeof($level3)<=2){
            array_push($level3, $autoposts[$x]);
        }
        
        if($autoposts[$x]["section"] === "n4" && sizeof($level4)<=2){
            array_push($level4, $autoposts[$x]);
        }
}


for ($x = 0; $x <= sizeof($originalPosts); $x++) {
    if ($originalPosts[$x]["status"] == "on") {
        if ($originalPosts[$x]["section"] === "n1" && sizeof($level1) < 4) {
            array_push($level1, $originalPosts[$x]);
        }

        if ($originalPosts[$x]["section"] === "n2" && sizeof($level2) <= 4) {
            array_push($level2, $originalPosts[$x]);
        }

        if ($originalPosts[$x]["section"] === "n3" && sizeof($level3) <= 8) {
            array_push($level3, $originalPosts[$x]);
        }

        if ($originalPosts[$x]["section"] === "n4" && sizeof($level4) <= 8) {
            array_push($level4, $originalPosts[$x]);
        }
    }
}

for ($x = 0; $x <= sizeof($extposts); $x++) {
    if ($extposts[$x]["section"] === "n1" && sizeof($level1) <= 3) {
        array_push($level1, $extposts[$x]);
    }
    if ($extposts[$x]["section"] === "n2") {
        array_push($level2, $extposts[$x]);
    }
    if ($extposts[$x]["section"] === "n3" && sizeof($level3) <= 8) {
        array_push($level3, $extposts[$x]);
    }
    if ($extposts[$x]["section"] === "n4" && sizeof($level4) <= 8) {
        array_push($level4, $extposts[$x]);
    }
}







require view("index.php", [
    "posts1" => $level1,
    "posts2" => $level2,
    "posts3" => $level3,
    "posts4" => $level4,
    "adsFront" => $adsFront,
    "adsSlide" =>$adsSlide,
    "adsMobile" =>$adsMobile,
    
]);