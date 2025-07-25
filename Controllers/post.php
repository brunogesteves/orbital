<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ?? [""];
$slug = str_replace("/", "", $uri);

use Core\Database;

$db = new Database();

date_default_timezone_set('America/Sao_Paulo');


$timeNow = strtotime(date('m/d/Y h:i:s a', time()));

$content = $db->find("SELECT p.*, i.name as image, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id  WHERE slug='$slug'");

// $morePosts = $db->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id ORDER BY RAND() LIMIT 3");

// $adsFront = $db->findAll("SELECT link, file FROM ads WHERE position='top' AND (startsAt <= $timeNow AND endsAt >= $timeNow) AND status= 'on'");

// $adsMobile = $db->findAll("SELECT link, file FROM ads WHERE position='mobile' AND (startsAt <= $timeNow AND endsAt >= $timeNow) AND status= 'on'");


$keywords = $content["content"] ?? "";
$author = $content["authorName"] ?? "";

var_dump($content);

if (empty($content)) {
    $content = [];
    require view("/abort.php",);
} else {
    require view("post.php");
}
