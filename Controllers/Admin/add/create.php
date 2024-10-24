<?php

use Core\Slug;
use Core\Database;

$db = new Database();
$createSlug = new Slug();


date_default_timezone_set('America/Sao_Paulo');

$title = trim($_POST["title"]);
$post_at = $_SESSION["user"]["role"] != "dir" ? time() : $_POST["post_at"];
$section = $_SESSION["user"]["role"] != "dir" ? "0" : $_POST["section"];
$image_id = (int) $_POST["image_id"];
$content = trim($_POST["content"]);
$slug = trim($createSlug->create($_POST["title"]));
$status = $_SESSION["user"]["role"] != "dir" ? "off" : "on";
$author = (int) $_SESSION["user"]["userID"];



$result = $db->insert('INSERT INTO posts(title, link, content, section, source, slug, status, post_at,faceId, image_id, author_id )
                          VALUES(:title, :link, :content, :section, :source, :slug, :status, :post_at, :faceId, :image_id, :author_id)', [
    "title" => $title,
    "link" => "",
    "content" => $content,
    "section" => $section,
    "source" => "Orbital Channel",
    "slug" => $slug,
    "status" => "off",
    "post_at" => $post_at,
    "faceId" => 0,
    "image_id" => $image_id,
    "author_id" => $author

]);


$lastId = $db->lastId("SELECT LAST_INSERT_ID()");
header('Location: ' . "/admin/editar?id=$lastId");
