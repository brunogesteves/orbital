<?php

use Core\Slug;
use Core\Database;

$db = new Database();
$createSlug = new Slug();


date_default_timezone_set('America/Sao_Paulo');

$title = trim($_POST["title"]);
// $post_at = $_SESSION["user"]["role"] != "dir" ? 0 : $_POST["post_at"];
$post_at = strtotime($_POST["post_at"]);
// $section = $_SESSION["user"]["role"] != "dir" ? "0" : $_POST["section"];
$section = $_POST["section"];
$image_id = (int) $_POST["image_id"];
$content = trim($createSlug->formatText($_POST["content"]));
$slug = trim($createSlug->create($_POST["title"]));
// $status = $_SESSION["user"]["role"] != "dir" ? "off" : "on";
$status =  "on";
// $author_id = (int) $_SESSION["user"]["userID"];
$author_id = 1;



$result = $db->insert('INSERT INTO posts(title,  content, section, slug, status, post_at, image_id, author_id )
                          VALUES(:title, :content, :section, :slug, :status, :post_at,  :image_id, :author_id)', [
    "title" => $title,
    "content" => $content,
    "section" => $section,
    "slug" => $slug,
    "status" => "off",
    "post_at" => $post_at,
    "image_id" => $image_id,
    "author_id" => $author_id

]);


$lastId = $db->lastId("SELECT LAST_INSERT_ID()");
header('Location: ' . "/admin/editar?id=$lastId");
