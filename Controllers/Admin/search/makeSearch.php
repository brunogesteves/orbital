<?php


use Core\Database;

$db = new Database();
$userID = (int) $_SESSION["user"]["userID"];

$searchTerm = $_POST["searchTerm"];

$results = $_SESSION["user"]["role"] == "dir"
    ? $db->findAll("SELECT p.*, i.name as image, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id WHERE
        p.title LIKE '%$searchTerm%' 
        OR p.title LIKE '%$searchTerm%'     
        OR p.content LIKE '%$searchTerm%'         
        ORDER BY p.post_at asc")

    : $db->findAll("SELECT p.*, i.name as image, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id WHERE p.author_id = $userID AND 
        p.title LIKE'%$searchTerm%' 
        OR p.title LIKE'%$searchTerm%'     
        OR p.content LIKE'%$searchTerm%' 
        ORDER BY p.post_at asc");



$_SESSION["results"] = $results;

header('Location: ' . "/admin/procurar");
