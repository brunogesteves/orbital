<?php

use Core\Database;
use Core\Users;

$db = new Database();
$getUsers = new Users();
date_default_timezone_set('America/Sao_Paulo');

$author = $_SESSION["user"]["userID"];
$role = $_SESSION["user"]["role"];

$users = $getUsers->allUsers();
$originalPosts = $role == "dir"
    ? $db->findAll("SELECT p.*, i.name as image, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id  ORDER BY p.post_at asc")
    : $db->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE p.author_id = $author  ORDER BY p.post_at asc");
$extposts = $db->findAll("SELECT * FROM extposts");
$autoposts = $db->findAll("SELECT * FROM autoposts ORDER BY post_at	DESC Limit 8");

$level1 = [];
$level2 = [];
$level3 = [];
$level4 = [];

for ($x = 0; $x <= sizeof($originalPosts); $x++) {

    if ($originalPosts[$x]["status"] == "on") {
        if ($originalPosts[$x]["section"] === "n1") {
            array_push($level1, $originalPosts[$x]);
        } else if ($originalPosts[$x]["section"] === "n2") {
            array_push($level2, $originalPosts[$x]);
        } else if ($originalPosts[$x]["section"] === "n3") {
            array_push($level3, $originalPosts[$x]);
        } else if ($originalPosts[$x]["section"] === "n4") {
            array_push($level4, $originalPosts[$x]);
        }
    }
}



require view("/admin/index.php", [
    "users" => $users,
    "posts" => $originalPosts,
    "posts1" => $level1,
    "posts2" => $level2,
    "posts3" => $level3,
    "posts4" => $level4,
]);
