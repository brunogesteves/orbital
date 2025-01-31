<?php

use Core\Database;

$db = new Database();

$id = $_POST["postId"];
$status = $_POST["recentStatus"];

// echo "publish: ", $id;
// echo "publish: ", $status;




$result = $db->update("UPDATE posts SET status='$status' WHERE id=$id");
header('Location: ' . "/admin");
