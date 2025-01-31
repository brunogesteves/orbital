<?php

use Core\Database;

$db = new Database();

$id = $_POST["adId"];
$status = $_POST["recentStatus"];

$db->update("UPDATE ads SET status='$status' WHERE id=$id");
header('Location: ' . "/admin/ads");
