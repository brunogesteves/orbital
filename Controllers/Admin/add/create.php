<?php

use Core\Slug;
use Core\Database;

$db = new Database();
$createSlug = new Slug();


date_default_timezone_set('America/Sao_Paulo');

$dtMinTime = new DateTime(date('m/d/Y h:i:s a', time()));
$minTime = $dtMinTime->format('Y-m-d\TH:i');

$title = trim($_POST["title"]);
$post_at = $_POST["post_at"];
$section = $_POST["section"];;
$image_id = (int) $_POST["image_id"];
$content = trim($_POST["content"]);
$slug = trim($createSlug->create($_POST["title"]));

// var_dump($_POST);

$result = $db->insert('INSERT INTO posts(title, link, content, section, source, slug, status, post_at,faceId, image_id )
                          VALUES(:title, :link, :content, :section, :source, :slug, :status, :post_at, :faceId, :image_id)', [
    "title" => $title,
    "link" => "",
    "content" => $content,
    "section" => $section,
    "source" => "Orbital Channel",
    "slug" => $slug,
    "faceId" => 0,
    "status" => "off",
    "post_at" => strtotime($post_at),
    "image_id" => $image_id
]);


$lastId = $db->lastId("SELECT LAST_INSERT_ID()");
header('Location: ' . "/admin/editar?id=$lastId");
