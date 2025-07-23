<?php

use Core\Slug;
use Core\Database;

$db = new Database();
$createSlug = new Slug();


date_default_timezone_set(timezoneId: 'America/Sao_Paulo');

$title = trim($_POST["title"]);
$content = trim($createSlug->formatText($_POST["content"]));
$slug = trim($createSlug->create($_POST["title"]));
$section = $_SESSION["user"]["role"] != "dir" ? "0" : $_POST["section"];
$category_id = (int) $_POST["category"];
$image_id = (int) $_POST["image_id"];
$author_id = (int) $_SESSION["user"]["userID"];
$post_at = $_SESSION["user"]["role"] != "dir" ? 0 : strtotime($_POST["post_at"]);

$result = $db->insert('INSERT INTO posts(title, content, slug, section,  status, category_id, image_id, author_id, post_at, created_at, updated_at)
                          VALUES(:title, :content, :slug, :section,  :status, :category_id, :image_id, :author_id, :post_at,:created_at,:updated_at)', [
    "title" => $title,
    "content" => $content,
    "section" => $section,
    "slug" => $slug,
    "status" => "off",
    "category_id" => $category_id,
    "image_id" => $image_id,
    "author_id" => $author_id,
    "post_at" => $post_at,
    "created_at" => time(),
    "updated_at" => 0

]);


$lastId = $db->lastId("SELECT LAST_INSERT_ID()");
header('Location: ' . "/admin/editar?id=$lastId");
