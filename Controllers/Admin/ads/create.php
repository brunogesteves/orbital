<?php

use Core\Database;

$db = new Database();

$title = $_POST["title"];
$position = $_POST["position"];
$link = $_POST["link"];
$status = $_POST["status"] ?? "off";
$startsAt = strtotime($_POST["startsAt"]);
$endsAt = strtotime($_POST["endsAt"]);

$fileName = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];

$separateFilename = explode('.', $fileName);
$ext = $separateFilename[1];
$target = "public/images/ads/" . $title . "." . $ext;

$image = str_replace(" ", "-", $title . "." . $ext);

$result = $db->insert('INSERT INTO ads(title, position, status, link, image, startsAt, endsAt)
            VALUES(:title, :position, :status, :link,:image, :startsAt, :endsAt)', [

    "title" => $title,
    "position" => $position,
    "status" => $status,
    "link" => $link,
    "image" => $image,
    "startsAt" => $startsAt,
    "endsAt" => $endsAt
]);
if ($result) {
    move_uploaded_file($tempName, $target);
}
header('Location: ' . "/admin/ads");
