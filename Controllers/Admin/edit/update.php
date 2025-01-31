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
$section = $_POST["section"];
$image_id = (int) $_POST["image_id"];
$slug = trim($createSlug->create($_POST["title"]));
// $status = $_SESSION["user"]["role"] != "dir" ? "off" : "on";


// echo "<pre>";
// // var_dump($_POST);
// echo "</pre>";

// echo "id: ", $id;
// echo "<br />";
// echo "title: ", $createSlug->formatTitle($title);
// echo "<br />";
// echo "content: ", $content;
// echo "<br />";
// echo "section: ", $section;
// echo "<br />";
// echo "slug: ", $slug;
// echo "<br />";
// echo "post_at: ", $post_at;
// echo "<br />";

// echo "image_id: ", $image_id;
// echo "<br />";



// $title2 = $createSlug->formatTitle("Acidente aéreo nos EUA:'Não acreditamos em sobreviventes'");
// echo $title2;
$db->update("UPDATE posts SET 
image_id=$image_id,
         post_at=$post_at,        
        title = '$title',
         content='$content',
         section='$section',        
         slug='$slug'
        WHERE id=$id");

header('Location: ' . "/admin/editar?id=$id");
