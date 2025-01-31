<?php

use Core\Database;

$db = new Database();
$id = $_POST["deletePostId"];


$db->delete("DELETE FROM posts WHERE id=$id");
header('Location: ' . "/admin");
