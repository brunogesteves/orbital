<?php

use Core\Database;

$db = new Database();


$id = (int) $_POST["id"];
$title = $_POST["title"];
$position = $_POST["position"];
$link = $_POST["link"];
$status = $_POST["status"];
$endsAt = $_POST["endsAt"];

$startsAt = strtotime(str_replace('T', ' ', $_POST["startsAt"]));

$endsAt = strtotime(str_replace('T', ' ', $_POST["endsAt"]));

$result = $db->update("UPDATE ads SET title='$title', 
position='$position',
link='$link',
status='$status',
startsAt=$startsAt,
endsAt=$endsAt
WHERE id=$id");



if ($result && (strlen($_FILES["image"]["name"])) > 0) {
    $fileName = $_FILES["image"]["name"];
    $tempName = $_FILES["image"]["tmp_name"];

    $separateFilename = explode('.', $fileName);
    $ext = $separateFilename[1];
    $target = "public/images/ads/" . $title . "." . $ext;

    $file = str_replace(" ", "-", $title . "." . $ext);
    move_uploaded_file($tempName, $target);
}


header('Location: ' . "/admin/ads");
