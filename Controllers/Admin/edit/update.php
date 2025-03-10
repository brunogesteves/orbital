<?php


use Core\Slug;
use Core\Database;

$db = new Database();
$createSlug = new Slug();


date_default_timezone_set('America/Sao_Paulo');

$id = trim($_POST["id"]);
$title = trim($createSlug->formatText($_POST["title"]));
$content = trim($createSlug->formatText($_POST["content"]));
// $post_at = $_SESSION["user"]["role"] != "dir" ? 0 : $_POST["post_at"];
$post_at = strtotime($_POST["post_at"]);
// $section = $_SESSION["user"]["role"] != "dir" ? "0" : $_POST["section"];
$category = $_POST["category"];

$section = $_POST["section"];
$image_id = (int) $_POST["image_id"];
$slug = trim($createSlug->create($_POST["title"]));
// $status = $_SESSION["user"]["role"] != "dir" ? "off" : "on";

$upated_at = time();


$db->update("UPDATE posts SET 
        image_id=$image_id,
        post_at=$post_at,        
        title = '$title',
        content='$content',
        category_id = $category,
        section='$section',        
        slug='$slug',
        upated_at =$upated_at
        WHERE id=$id");

header('Location: ' . "/admin/editar?id=$id");
