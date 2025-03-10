<?php

use Core\Slug;
use Core\Database;

$db = new Database();
$createSlug = new Slug();


date_default_timezone_set(timezoneId: 'America/Sao_Paulo');

$title = trim($_POST["title"]);
$post_at = $_SESSION["user"]["role"] != "dir" ? 0 : strtotime($_POST["post_at"]);
$section = $_SESSION["user"]["role"] != "dir" ? "0" : $_POST["section"];
$image_id = (int) $_POST["image_id"];
$category = $_POST["category"];
$content = trim($createSlug->formatText($_POST["content"]));
$slug = trim($createSlug->create($_POST["title"]));
$status = $_SESSION["user"]["role"] != "dir" ? "off" : "on";

$author_id = (int) $_SESSION["user"]["userID"];




$result = $db->insert('INSERT INTO posts(title,  content, section, slug, status, post_at, image_id, author_id )
                          VALUES(:title, :content, :section, :slug, :status, :post_at,  :image_id, :author_id)', [
    "title" => $title,
    "content" => $content,
    "section" => $section,
    "slug" => $slug,
    "status" => $status,
    "post_at" => $post_at,
    "category_id" => $category,
    "image_id" => $image_id,
    "author_id" => $author_id,
    "created_at" => time(),
    "upated_at" => 0

]);


$lastId = $db->lastId("SELECT LAST_INSERT_ID()");
header('Location: ' . "/admin/editar?id=$lastId");
