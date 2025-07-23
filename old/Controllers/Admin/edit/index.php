<?php
$uri = explode("?", $_SERVER['REQUEST_URI']);
$id = (int) str_replace("id=", "", $uri[1]);

use Core\Database;
use Core\Images;

$db = new Database();
$getImages = new Images();
date_default_timezone_set('America/Sao_Paulo');

$images = $getImages->getImages();
$post = $db->find("SELECT p.*, i.name as image, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id WHERE p.id=$id");

$scheduled = (new DateTime(date("Y-m-d h:i ", $post["post_at"])))->format('Y-m-d\TH:i');

$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

require view("/admin/edit.php", [
    "post" => $post,
    "images" => $images,
    "scheduled" => $scheduled,
    "minTime" => $minTime,
]);
