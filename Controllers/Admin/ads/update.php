<?php

use Core\Database;

$db = new Database();


$id = (int) $_POST["id"];
$name = $_POST["title"];
$link = $_POST["link"];
$status = $_POST["status"];
$position = $_POST["position"];
$starts_at = (int) $_POST["startsAt"];
$endsAt = (int) $_POST["endsAt"];


$result = $db->update("UPDATE ads SET name='$name', 
position='$position',
status='$status',
link='$link',
starts_at=$starts_at,
finishs_at=$endsAt
WHERE id=$id");



if ($result && (strlen($_FILES["image"]["name"])) > 0) {
    $fileName = $_FILES["image"]["name"];
    $tempName = $_FILES["image"]["tmp_name"];

    $separateFilename = explode('.', $fileName);
    $ext = $separateFilename[1];
    $target = "public/images/ads/" . $name . "." . $ext;

    $file = str_replace(" ", "-", $name . "." . $ext);
    move_uploaded_file($tempName, $target);
}


header('Location: ' . "/admin/ads");
