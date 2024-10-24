<?php

use Core\Slug;
use Core\Database;

$createSlug = new Slug();
$db = new Database();

$id = (int) $_POST["id"];
$title = trim($_POST["title"]);
$content = trim($_POST["content"]);
$section = $_POST["section"];
$slug = trim($createSlug->create($_POST["title"]));
$post_at =  strtotime($_POST["post_at"]);
$image_id = (int) $_POST["image_id"];

echo ($image_id);
$db->update("UPDATE posts SET 
        title='$title',
        content='$content',
        section='$section',        
        slug='$slug',
        post_at=$post_at,
        image_id=$image_id
        WHERE id=$id");


header('Location: ' . "/admin/editar?id=$id");
