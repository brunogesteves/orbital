<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ?? [""];
$slug = str_replace("/", "", $uri);

use Core\Database;

$db = new Database();

date_default_timezone_set('America/Sao_Paulo');


$timeNow =strtotime( date('m/d/Y h:i:s a', time()));

$post = $db->find("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE slug='$slug'");
$extpost = $db->find("SELECT * FROM extposts WHERE slug='$slug'");
$autopost = $db->find("SELECT * FROM autoposts WHERE slug='$slug'");
$morePosts = $db->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id ORDER BY RAND() LIMIT 3");
$adsPostFront = $db->findAll("SELECT link, file FROM ads WHERE position='front' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");
$adsPostMobile = $db->findAll("SELECT link, file FROM ads WHERE position='mobile' AND (starts_at <= $timeNow AND finishs_at >= $timeNow) AND status= 'on'");


if (empty($post) && empty($extpost) && empty($autopost)) {
    require view("/abort.php",);
} else {
    if (!empty($post)) {
        $content = $post;
    }
    if (!empty($extpost)) {
        $content = $extpost;
    }

    if (!empty($autopost)) {
        $content = $autopost;
    }

}


require view("post.php", [
    "content" => $content,
    "morePosts" => $morePosts,
    "adsPostFront" => $adsPostFront,
    "adsPostMobile" => $adsPostMobile,
]);
