<?php

use Core\Database;

$db = new Database();

$id = (int) $_POST["id"];
$title = $_POST["title"];
$link = $_POST["link"];
$status = $_POST["status"] ?? "off";
$position = $_POST["position"];
$startsAt = strtotime($_POST["startsAt"]);
$endsAt = strtotime($_POST["endsAt"]);

// var_dump($_FILES["image"]);

if (strlen($_FILES["image"]["name"]) > 0) {
    $fileName = $_FILES["image"]["name"];
    $tempName = $_FILES["image"]["tmp_name"];

    $separateFilename = explode('.', $fileName);
    $ext = $separateFilename[1];
    $target = "public/images/ads/" . $title . "." . $ext;

    $file = str_replace(" ", "-", $title . "." . $ext);
}

$result = $db->update("UPDATE ads SET    
    position = '$position',
    status = '$status',    
    link = '$link',
    starts_at = $startsAt,
    finishs_at = $endsAt
    WHERE id=$id");

if ($result) {
    if (strlen($_FILES["image"]["name"]) > 0) {
        move_uploaded_file($tempName, $target);
    }
}
header('Location: ' . "/admin/editarad?id=$id");
