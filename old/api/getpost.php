<?php

header('Content-Type: application/json');

include 'index.php';


$statment;

$id = (int) $_GET["id"];

$query ="SELECT p.*, i.name as image, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id  WHERE p.id=$id";
// echo json_encode(["id"=>$id],  JSON_UNESCAPED_SLASHES);
$statment = $connection->prepare($query);
// echo json_encode(["query3"=> $query],  JSON_UNESCAPED_SLASHES);

$ex =$statment->execute([]);
// echo json_encode([ "execute"=> $ex],  JSON_UNESCAPED_SLASHES);
$post = $statment->fetch();
echo json_encode([ "post"=>$post],  JSON_UNESCAPED_SLASHES);

