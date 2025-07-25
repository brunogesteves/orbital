<?php

use Core\Database;


$db = new Database();

$userID = (int) $_SESSION["user"]["userID"];

$allPosts = $_SESSION["user"]["role"] == "dir"
    ? $db->findAll("SELECT p.*, i.name, i.file, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id  ORDER BY p.post_at asc")
    : $db->findAll("SELECT p.*, i.name, i.file, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id WHERE p.author_id = $userID ORDER BY p.post_at asc");


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
