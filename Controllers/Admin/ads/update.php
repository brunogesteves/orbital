<?php

use Core\Database;

$db = new Database();


date_default_timezone_set('America/Sao_Paulo');

$dtMinTime = new DateTime(date('m/d/Y h:i:s a', time()));
$minTime = $dtMinTime->format('Y-m-d\TH:i');

$id = (int) $_POST["updateAdId"];
$name = $_POST["adName"];
$position = $_POST["adPosition"];
$file = $_POST["adName"];
$link = $_POST["adLink"];
$starts_at = strtotime($_POST["adStarts_at"]);
$finishs_at = strtotime($_POST["adFinishs_at"]);


echo "<pre>";
var_dump($id);
var_dump($name);
var_dump($position);
var_dump($file);
var_dump($link);
var_dump($starts_at);
var_dump($finishs_at);
var_dump($_FILES["adUpdateFileUpload"]["name"]);

echo "</pre>";
if ((strlen($_FILES["adUpdateFileUpload"]["name"]) != 0)) {


    $fileName = $_FILES["adUpdateFileUpload"]["name"];
    $tempName = $_FILES["adUpdateFileUpload"]["tmp_name"];
    $fileSize = $_FILES["adUpdateFileUpload"]['size'];
    $fileError = $_FILES["adUpdateFileUpload"]['error'];

    $separateFilename = explode('.', $fileName);
    $ext = $separateFilename[1];
    $target = "images/ads/" . $_POST["adName"] . "." . $ext;

    $file = $file . "." . $ext;
    $result = $db->update("UPDATE ads SET
            name = '$name',
            position = '$position',
            file = '$file',
            link = '$link',
            starts_at = $starts_at,
            finishs_at = $finishs_at
            WHERE id=$id");

    if ($result) {
        if (move_uploaded_file($tempName, $target)) {
            header('Location: ' . "/admin/ads");
        }
    }
} else {
    $result = $db->update("UPDATE ads SET
    name = '$name',
    position = '$position',
    link = '$link',
    starts_at = $starts_at,
    finishs_at = $finishs_at
    WHERE id=$id");

    if ($result) {
        header('Location: ' . "/admin/ads");
    }
}
