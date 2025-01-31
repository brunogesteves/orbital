<?php

use Core\Database;

$db = new Database();

$title = $_POST["title"];
$link = $_POST["link"];
$status = $_POST["status"] ?? "off";
$position = $_POST["position"];
$startsAt = strtotime($_POST["startsAt"]);
$endsAt = strtotime($_POST["endsAt"]);

$fileName = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];

$separateFilename = explode('.', $fileName);
$ext = $separateFilename[1];
$target = "public/images/ads/" . $title . "." . $ext;

$file = str_replace(" ", "-", $title . "." . $ext);

$result = $db->insert('INSERT INTO ads(name, position, status, file, link, starts_at, finishs_at)
            VALUES(:name, :position, :status, :file, :link, :starts_at, :finishs_at)', [

    "name" => $title,
    "position" => $position,
    "status" => $status,
    "file" => $file,
    "link" => $link,
    "starts_at" => $startsAt,
    "finishs_at" => $endsAt
]);
if ($result) {
    move_uploaded_file($tempName, $target);
}
header('Location: ' . "/admin/ads");
