<?php
$uri = explode("?", $_SERVER['REQUEST_URI']);
$id = (int) str_replace("id=", "", $uri[1]);

use Core\Database;
use Core\Images;

$db = new Database();
$post = $db->find("SELECT p.*, i.file, i.name, u.name as authorName, c.name as category FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id INNER JOIN categories c ON c.id = p.category_id WHERE p.id=$id");
$getImages = new Images();
$allImages = $getImages->getImages();
$AllCategories = $db->findAll("SELECT * FROM categories  ORDER BY name ASC");


date_default_timezone_set('America/Sao_Paulo');
$scheduled = (new DateTime(date("Y-m-d h:i ", $post["post_at"])))->format('Y-m-d\TH:i');
$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

// echo "<pre>";
// var_dump($post);
// echo "</pre>";
require view("/admin/edit.php");