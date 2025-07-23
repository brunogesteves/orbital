<?php

header('Content-Type: application/json');

include 'index.php';


$statment;

$query = "SELECT p.*, i.name as image FROM posts p INNER JOIN images i ON i.id = p.image_id ORDER BY p.post_at asc";
$statment = $connection->prepare($query);

$posts= $statment->execute([]);
$posts = $statment->fetchAll();


$level1 = [];
$level2 = [];
$level3 = [];
$level4 = [];



for ($x = 0; $x < sizeof($posts); $x++) {
    if ($posts[$x]["status"] == "on") {
        if ($posts[$x]["section"] === "n1" && sizeof($level1) < 4) {
            array_push($level1, $posts[$x]);
        }
        if ($posts[$x]["section"] === "n2" && sizeof($level2) < 4) {
            array_push($level2, $posts[$x]);
        }
        if ($posts[$x]["section"] === "n3" && sizeof($level3) < 7) {
            array_push($level3, $posts[$x]);
        }
        if ($posts[$x]["section"] === "n4" && sizeof($level4) < 9) {
            array_push($level4, $posts[$x]);
        }
    }
}

echo json_encode(["level1"=>$level1, "level2"=>$level2, "level3"=>$level3, "level4"=>$level4],  JSON_UNESCAPED_SLASHES);