<?php

use Core\Database;
// use Core\Users;

$db = new Database();
// $getUsers = new Users();
// date_default_timezone_set('America/Sao_Paulo');

// $author = $_SESSION["user"]["userID"];
// $role = $_SESSION["user"]["role"];

// $users = $getUsers->allUsers();
// $originalPosts = $role == "dir"
//     ? $db->findAll("SELECT p.*, i.name as image, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id  ORDER BY p.post_at asc")
//     : $db->findAll("SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id WHERE p.author_id = $author  ORDER BY p.post_at asc");


$allPosts = $db->findAll("SELECT p.*, i.name as image, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id  ORDER BY p.post_at asc");


$level1 = [];
$level2 = [];
$level3 = [];
$level4 = [];



for ($x = 0; $x < sizeof($allPosts); $x++) {
    if ($allPosts[$x]["status"] == "on") {
        if ($allPosts[$x]["section"] === "n1" && sizeof($level1) < 4) {
            array_push($level1, $allPosts[$x]);
        }
        if ($allPosts[$x]["section"] === "n2" && sizeof($level2) < 4) {
            array_push($level2, $allPosts[$x]);
        }
        if ($allPosts[$x]["section"] === "n3" && sizeof($level3) < 7) {
            array_push($level3, $allPosts[$x]);
        }
        if ($allPosts[$x]["section"] === "n4" && sizeof($level4) < 9) {
            array_push($level4, $allPosts[$x]);
        }
    }
}



require view("/admin/index.php");
