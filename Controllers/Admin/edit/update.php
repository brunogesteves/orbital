<?php


use Core\Slug;
use Core\Database;

$db = new Database();
$createSlug = new Slug();


date_default_timezone_set('America/Sao_Paulo');

$id = trim($_POST["id"]);
$title = trim($createSlug->formatText($_POST["title"]));
$content = trim($createSlug->formatText($_POST["content"]));
$slug = trim($createSlug->create($_POST["title"]));
$section = $_POST["section"];
$category_id = (int) $_POST["category"];

$post_at = strtotime($_POST["post_at"]);
// $section = $_SESSION["user"]["role"] != "dir" ? "0" : $_POST["section"];

$image_id = (int) $_POST["image_id"];

$upated_at = time();


$db->update("UPDATE posts SET 
        title = '$title',
        content='$content',
        section='$section',        
        slug='$slug',
        category_id = $category_id,
        image_id=$image_id,
        post_at=$post_at,        
        updated_at =$upated_at
        WHERE id=$id");

header('Location: ' . "/admin/editar?id=$id");
